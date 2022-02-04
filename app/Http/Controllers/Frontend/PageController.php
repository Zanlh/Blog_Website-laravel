<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use App\media;
use App\AdminUser;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserProfile;
use App\Post;


class PageController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        $profile_photo = $user->photos->where('type', 1)->first();
        $cover_photo = $user->photos->where('type', 2)->first();
        return view('frontend.profile', compact('user', 'profile_photo', 'cover_photo', 'id'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('frontend.edit_profile', compact('user', 'id'));
    }

    public function updateUserProfile($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,

        ]);
        $user = User::findOrFail($id);


        $profile_photos = $user->photos->where('type', 1);
        $cover_photos = $user->photos->where('type', 2);

        if ($request->hasFile('profile')) {
            foreach ($profile_photos as $profile_photo) {
                if ($profile_photo != null) {
                    Storage::disk('public')->delete('profile/' . $profile_photo->path);
                    $profile_photo->delete();
                }
            }

            $profile_photo_file = $request->file('profile');
            $profile_file_name = time() . '.' . $profile_photo_file->getClientOriginalExtension();
            Storage::disk('public')->put(
                'profile/' . $profile_file_name,
                file_get_contents($profile_photo_file->getRealPath())
            );

            $new_profile_photo = new media();
            $new_profile_photo->path = $profile_file_name;
            $new_profile_photo->imageable_id = $user->id;
            $new_profile_photo->imageable_type = User::class;
            $new_profile_photo->type = 1;
            $new_profile_photo->save();
        }

        if ($request->hasFile('cover')) {
            foreach ($cover_photos as $cover_photo) {
                if ($cover_photo != null) {
                    Storage::disk('public')->delete('cover/' . $cover_photo->path);
                    $cover_photo->delete();
                }
            }

            $cover_photo_file = $request->file('cover');
            $cover_file_name = time() . '.' . $cover_photo_file->getClientOriginalExtension();
            Storage::disk('public')->put(
                'cover/' . $cover_file_name,
                file_get_contents($cover_photo_file->getRealPath())
            );

            $new_cover_photo = new media();
            $new_cover_photo->path = $cover_file_name;
            $new_cover_photo->imageable_id = $user->id;
            $new_cover_photo->imageable_type = User::class;
            $new_cover_photo->type = 2;
            $new_cover_photo->save();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return redirect()->route('profile', $id)->with('update', 'Successfully Updated');
    }

    public function updatePassword()
    {
        return view('frontend.update_password');
    }

    public function updatePasswordStore(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|max:20'

        ]);
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $user = Auth::guard('web')->user();

        if (Hash::check($old_password, $user->password)) {
            $user->password = Hash::make($new_password);
            $user->update();

            return redirect()->route('profile', $user->id)->with('update', 'Successfully Updated.');
        }

        return back()->withErrors(['old_password' => 'The old password is not correct!'])->withInput();
    }

    public function createPost()
    {
        $categories = Category::orderBy('category_name')->get();
        return view('frontend.create_post', compact('categories'));
    }

    public function storePost(Request $request)
    {
        $post = new Post();
        $photos = new media();

        $post->user_id = Auth::guard('web')->user()->id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->save();

        if ($files = $request->post_photos) {

            foreach ($files as $file) {
                $post_photo_file = $file;
                $post_file_name = time() . mt_rand(1000000000000000, 9999999999999999) . '.' . $post_photo_file->getClientOriginalExtension();
                Storage::disk('public')->put(
                    'posts/' . $post_file_name,
                    file_get_contents($post_photo_file->getRealPath())
                );
                $new_post_photo = new media();
                $new_post_photo->path = $post_file_name;
                $new_post_photo->imageable_id = $post->id;
                $new_post_photo->imageable_type = Post::class;
                $new_post_photo->type = 3;
                $new_post_photo->save();
            }
        }

        return redirect()->route('feed')->with('create', 'Post created successfully.');
    }

    public function myPosts()
    {
        $user = User::findOrFail(Auth::guard('web')->user()->id);
        $profile_photo = $user->photos->where('type', 1)->first();
        $posts = Post::with('user', 'category')->orderBy('created_at', 'desc')->where('user_id', Auth::guard('web')->user()->id)->get();

        return view('frontend.my_posts', compact('profile_photo', 'user', 'posts'));
    }

    public function myPostDetail($id)
    {
        $post = Post::with('user', 'category')->where('id', $id)->where('user_id', Auth::guard('web')->user()->id)->get();

        return view('frontend.post_detail', compact('post'));
    }

    public function feed()
    {
        $posts  = Post::orderBy('created_at','desc')->get();
        return view('frontend.feed',compact('posts'));
    }
}
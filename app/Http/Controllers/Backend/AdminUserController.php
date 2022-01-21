<?php

namespace App\Http\Controllers\Backend;

use App\media;
use App\AdminUser;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminUser;
use App\Http\Requests\UpdateAdminUser;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAdminProfile;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('backend.admin_user.index');
    }

    public function ssd()
    {
        $data = AdminUser::query();
        return Datatables::of($data)
            ->editColumn('user_agent', function ($each) {
                if ($each->user_agent) {
                    $agent = new Agent();
                    $agent->setUserAgent($each->user_agent);
                    $device = $agent->device();
                    $platform = $agent->platform();
                    $browser = $agent->browser();

                    return '<table class="table table-bordered">
                <tbody>
                <tr><td>Device</td><td>' . $device . '</td></tr>
                <tr><td>Platform</td><td>' . $platform . '</td></tr>
                <tr><td>Browser</td><td>' . $browser . '</td></tr>
                </tbody>
                </table>';
                }
                return '--';
            })
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('Y-m-d H:i:s');
            })
            ->editColumn('updated_at', function ($each) {
                return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
            })
            ->addColumn('action', function ($each) {
                $edit_icon = '<a href="' . route('admin.admin-user.edit', $each->id) . '" class="text-warning"><i class="fas fa-edit"></i></a>';
                $delete_icon = '<a href="#" class="text-danger delete" data-id="' . $each->id . '"><i class="fas fa-trash"></i></a>';

                return  '<div class="action-icon">' . $edit_icon .  '   ' . $delete_icon . '</div>';
            })
            ->rawColumns(['user_agent', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('backend.admin_user.create');
    }

    public function store(StoreAdminUser $request)
    {
        $admin_user = new AdminUser();
        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->password = Hash::make($request->password);
        $admin_user->save();

        return redirect()->route('admin.admin-user.index')->with('create', 'Successfully Created');
    }

    public function edit($id)
    {
        $admin = AdminUser::findOrFail($id);
        return view('backend.admin_user.edit', compact('admin'));
    }

    public function update($id, UpdateAdminUser $request)
    {

        $admin_user = AdminUser::findOrFail($id);
        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->password = $request->password ? Hash::make($request->password) : $admin_user->password;
        $admin_user->update();

        return redirect()->route('admin.admin-user.index')->with('update', 'Successfully Updated');
    }


    public function destroy($id)
    {
        $admin_user = AdminUser::findOrFail($id);
        $admin_user->delete();

        return 'success';
    }

    public function profile($id)
    {
        $admin_user = AdminUser::findOrFail($id);
        $profile_photos = $admin_user->photos->where('type', 1);
        $cover_photos = $admin_user->photos->where('type', 2);
        return view('backend.admin_user.profile', compact('admin_user', 'id', 'cover_photos', 'profile_photos'));
    }

    public function updateProfile($id, Request $request)
    {
        $admin_user = AdminUser::findOrFail($id);
        $profile_photos = $admin_user->photos->where('type', 1);
        $cover_photos = $admin_user->photos->where('type', 2);

        if ($request->hasFile('profile')) {
            foreach ($profile_photos as $profile_photo) {
                if ($profile_photo != null) {
                    Storage::disk('public')->delete('profile/'. $profile_photo->path);
                    $profile_photo->delete();
                }
            }

            $profile_photo_file = $request->file('profile');
            $profile_file_name = time() . '.' . $profile_photo_file->getClientOriginalExtension();
            Storage::disk('public')->put('profile/'. $profile_file_name ,
                file_get_contents($profile_photo_file->getRealPath()));

            $new_profile_photo = new media();
            $new_profile_photo->path = $profile_file_name;
            $new_profile_photo->imageable_id = $admin_user->id;
            $new_profile_photo->imageable_type = AdminUser::class;
            $new_profile_photo->type = 1;
            $new_profile_photo->save();

        }

        if ($request->hasFile('cover')) {
            foreach ($cover_photos as $cover_photo) {
                if ($cover_photo != null) {
                    Storage::disk('public')->delete('cover/'. $cover_photo->path);
                    $cover_photo->delete();
                }
            }

            $cover_photo_file = $request->file('cover');
            $cover_file_name = time() . '.' . $cover_photo_file->getClientOriginalExtension();
            Storage::disk('public')->put('cover/'. $cover_file_name ,
                file_get_contents($cover_photo_file->getRealPath()));

            $new_cover_photo = new media();
            $new_cover_photo->path = $cover_file_name;
            $new_cover_photo->imageable_id = $admin_user->id;
            $new_cover_photo->imageable_type = AdminUser::class;
            $new_cover_photo->type = 2;
            $new_cover_photo->save();

        }


        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->password = $request->password ? Hash::make($request->password) : $admin_user->password;
        $admin_user->update();

        return redirect()->route('admin.profile', $id)->with('update', 'Successfully Updated');
    }
}

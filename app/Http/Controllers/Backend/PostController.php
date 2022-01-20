<?php

namespace App\Http\Controllers\Backend;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        return view('backend.post.index');
    }

    public function ssd(){
        $posts = Post::with('user','category');
        return DataTables::of($posts)
        ->addColumn('by',function($each){
            $user=$each->user;
            if($user){
                return '<p>Name : ' . $user->name . ' </p><p>Email : ' . $user->email . '</p>';
            }
            return '-';
        })
        ->addColumn('category',function($each){
            $category=$each->category;
            if($category){
                return '<p>' . $category->category_name . ' </p>';
            }
            return '-';
        })
        ->editColumn('created_at', function ($each) {
            return Carbon::parse($each->created_at)->format('Y-m-d H:i:s');
        })
        ->editColumn('updated_at', function ($each) {
            return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
        })
        ->rawColumns(['by','category'])
        ->make(true);

    }
}

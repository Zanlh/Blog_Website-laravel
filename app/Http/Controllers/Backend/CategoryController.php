<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.category.index');
    }

    public function ssd()
    {
        $data = Category::query();
        return Datatables::of($data)
            ->addColumn('action', function ($each) {
                $edit_icon = '<a href="' . route('admin.category.edit', $each->id) . '" class="text-warning"><i class="fas fa-edit"></i></a>';
                $delete_icon = '<a href="#" class="text-danger delete" data-id="' . $each->id . '"><i class="fas fa-trash"></i></a>';

                return  '<div class="action-icon">' . $edit_icon . '   ' .  $delete_icon . '</div>';
            })
            ->rawColumns(['user_agent', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(StoreCategory $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->save();

        return redirect()->route('admin.category.index')->with('create', 'Successfully Created');
    }

    public function edit($id)
    {
        $category =  Category::findOrFail($id);
        return view('backend.category.edit',compact('category'));
    }
    public function update($id, UpdateCategory $request)
    {
        $category =  Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->update();
        return redirect()->route('admin.category.index')->with('update', 'Successfully Updated');
    }

    public function destroy($id){
        $category =  Category::findOrFail($id);
        $category->delete();
        return 'success';
    }
}

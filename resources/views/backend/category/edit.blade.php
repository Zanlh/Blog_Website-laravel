@extends('backend.layouts.app')
@section('title', 'Edit Category')
@section('header-name', 'Edit Category')
@section('content')
    <form class="form "action="{{ route('admin.category.update',$category->id) }}" method="post" id="update">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}"
                placeholder="Enter category name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Category Description address</label>
            <input type="text" class="form-control" name="category_desc" value="{{$category->category_desc}}"
                placeholder="Enter description">
        </div>
        <button class="btn btn-secondary back-btn">Cancel</button>
        <button type="submit" class="btn btn-theme">Submit</button>
    </form>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\UpdateCategory','#update') !!}

    <script>
        $(document).ready(function() {
            $('.Datatable').DataTable({
                
            });
        });
    </script>
@endsection

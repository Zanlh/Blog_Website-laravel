@extends('backend.layouts.app')
@section('title', 'Create Category')
@section('header-name', 'Create Category')
@section('content')
    <form class="form "action="{{ route('admin.category.store') }}" method="post" id="create">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control" name="category_name"
                placeholder="Enter category name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Category Description address</label>
            <input type="text" class="form-control" name="category_desc"
                placeholder="Enter description">
        </div>
        <button class="btn btn-secondary back-btn">Cancel</button>
        <button type="submit" class="btn btn-theme">Submit</button>
    </form>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreCategory','#create') !!}

    <script>
        $(document).ready(function() {
            $('.Datatable').DataTable({
                
            });
        });
    </script>
@endsection

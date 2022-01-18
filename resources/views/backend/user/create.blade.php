@extends('backend.layouts.app')
@section('title', 'Create User')
@section('header-name', 'Create User')
@section('content')
    <form class="form "action="{{ route('admin.user.store') }}" method="post" id="create">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name"
                placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email"
                placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button class="btn btn-secondary back-btn">Cancel</button>
        <button type="submit" class="btn btn-theme">Submit</button>
    </form>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreUser','#create') !!}

    <script>
        $(document).ready(function() {
            $('.Datatable').DataTable({
                
            });
        });
    </script>
@endsection

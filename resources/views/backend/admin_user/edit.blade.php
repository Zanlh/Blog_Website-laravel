@extends('backend.layouts.app')
@section('title', 'Edit Admin User')
@section('header-name', 'Edit Admin User')
@section('content')
    <form class="form "action="{{ route('admin.admin-user.update', $admin->id) }}" method="post" id="update">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" value="{{$admin->name}}"
                placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" value="{{$admin->email}}"
            placeholder="Enter name">
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
{!! JsValidator::formRequest('App\Http\Requests\UpdateAdminUser','#update') !!}

    <script>
        $(document).ready(function() {
            $('.Datatable').DataTable({
                
            });
        });
    </script>
@endsection
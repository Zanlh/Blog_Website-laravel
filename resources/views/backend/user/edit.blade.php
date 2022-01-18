@extends('backend.layouts.app')
@section('title', 'Edit User')
@section('header-name', 'Edit User')
@section('content')
    <form class="form "action="{{ route('admin.user.update', $user->id) }}" method="post" id="update">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}"
                placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}"
            placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button class="btn btn-secondary">Cancel</button>
        <button type="submit" class="btn btn-theme">Submit</button>
    </form>
@endsection

@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\UpdateUser','#update') !!}

    <script>
        $(document).ready(function() {
            $('.Datatable').DataTable({
                
            });
        });
    </script>
@endsection

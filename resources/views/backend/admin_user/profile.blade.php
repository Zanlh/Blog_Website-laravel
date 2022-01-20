@extends('backend.layouts.app')
@section('profile-active', 'active')
@section('title', 'Profile')
@section('header-name', 'Profile')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="{{ asset('backend/assets/img/cover.png') }}" alt="...">
                </div>
                <div class="card-body">
                    <div class="author">
                        <div href="#">
                            <img class="avatar border-gray" src="{{ asset('backend/assets/img/pfp.png') }}" alt="...">
                            <h5 class="title" style="color: #84CB9A">{{ $admin_user->name }}</h5>
                        </div>
                    </div>
                    <p class="description text-center">
                        "I like the way you work it <br>
                        No diggity <br>
                        I wanna bag it up"
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form class="form " action="{{ route('admin.admin-user.update', $admin_user->id) }}" method="post"
                        id="update">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $admin_user->name }}"
                                placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{ $admin_user->email }}"
                                placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-theme">Save Setting</button></div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

        })
    </script>

@endsection

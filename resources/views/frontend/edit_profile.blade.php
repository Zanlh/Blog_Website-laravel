@extends('frontend.layouts.app')
@section('title', 'edit profile')
@section('name')
@section('content')

    <div class="edit-profile">
        <div class="card">
            <div class="card-body">
                <form class="form " action="{{ url('/profile/update/' . $user->id) }}" method="post" id="update"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name </label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email " class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Old Password</label>
                        <input type="password" name="old_password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Profile Photo</label>
                        <input type="file" name="profile" accept="image/*" class="form-control"
                            id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Cover Photo</label>
                        <input type="file" name="cover" accept="image/*" class="form-control"
                            id="exampleFormControlFile1">
                    </div>
                    <button class="btn btn-dark back-btn" style="margin-left: 270px">Cancle</button>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>

@endsection

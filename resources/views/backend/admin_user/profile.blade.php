@extends('backend.layouts.app')
@section('profile-active', 'active')
@section('title', 'Profile')
@section('header-name', 'Profile')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">

                <div class="image">
                    @foreach ($cover_photos as $cover_photo)
                        <img src="{{ asset('storage/cover/' . $cover_photo->path) }}" alt="...">
                    @endforeach
                </div>
                <div class="card-body">
                    <div class="author">
                        @foreach ($profile_photos as $profile_photo)
                            <img class="avatar border-gray" src="{{ asset('storage/profile/' . $profile_photo->path) }}"
                                alt="...">
                        @endforeach
                        <h5 class="title" style="color: #84CB9A">{{ $admin_user->name }}</h5>
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
                    <form class="form " action="{{ url('admin/profile/update/' . $id) }}" method="post"
                        id="update" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="id" value="{{ $admin_user->id }}"> --}}
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $admin_user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{ $admin_user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profile">Upload profile photo.</label>
                                    <input type="file" class="form-control"  id="profile" name="profile" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cover">Upload cover photo.</label>
                                    <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-theme">Save Setting</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- {!! JsValidator::formRequest('App\Http\Requests\UpdateAdminUser', '#update') !!} --}}
    <script>
        $(document).ready(function() {

        })
    </script>

@endsection

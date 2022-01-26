@extends('frontend.layouts.app')
@section('title', 'edit profile')
@section('name')
@section('content')

    <div class="edit-profile">
        <div class="card">
            <div class="card-body">
                <form class="form " action="{{ url('/profile/update/' . $id) }}" method="post" id="update"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name </label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $user->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ $user->email }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Profile Photo</label>
                        <input type="file" name="profile" accept="image/*" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Cover Photo</label>
                        <input type="file" name="cover" accept="image/*" class="form-control">
                    </div>
                    <button class="btn btn-dark back-btn" style="margin-left: 270px">Cancle</button>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    {{-- {!! JsValidator::formRequest('App\Http\Requests\UpdateUserProfile','#update') !!} --}}

@endsection

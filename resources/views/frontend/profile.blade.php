@extends('frontend.layouts.app')
@section('active', 'profile-active')
@section('title', 'profile')
@section('name')
@section('content')
    <div class="user-profile">
        <div class="card">
            <div class="image">

                @if ($profile_photo == null)

                @else
                    <img src="{{ asset('storage/cover/' . $cover_photo->path) }}" alt="...">
                @endif
            </div>
            <div class="card-body">
                <div class="author">
                    <div class="row">
                        <div class="col-md-3">
                            @if ($profile_photo == null)
                                <img class="avatar"
                                    src="https://ui-avatars.com/api/?size=100&name={{ $user->name }}" alt="...">
                            @else
                                <img class="avatar" src="{{ asset('storage/profile/' . $profile_photo->path) }}"
                                    alt="...">
                            @endif
                        </div>
                        <div class="col-md-5">
                            <div class="info">
                                {{ Auth()->user()->name }}<br>
                                <div class="text-muted"> <small>{{ $user->email }}</small></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="edit">
                                <a type="button" class="btn btn-dark" id="dropdownMenuLink" data-toggle="dropdown"
                                    aria-expanded="false"
                                    href="{{ url('/profile/edit/' . auth()->user()->id) }}"><small>Update</small></a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ url('/profile/edit/' . auth()->user()->id) }}">
                                        <small>Update Profile</small> </a>
                                    <a class="dropdown-item" href="#"><small>Update Password</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


{{-- src="{{ asset('storage/cover/1642751204.jfif') }}
src="{{ asset('storage/profile/1642772392.jpg') }} --}}

{{-- href="{{ url('/profile/edit/' . auth()->user()->id) }}" --}}

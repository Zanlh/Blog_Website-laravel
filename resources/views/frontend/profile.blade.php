@extends('frontend.layouts.app')
@section('active', 'profile-active')
@section('title', 'profile')
@section('name')
@section('content')
    <div class="user-profile">
        <div class="card">
            <div class="image">
                <img src="{{ asset('storage/cover/1642751204.jfif') }}" alt="">
            </div>
            <div class="card-body">
                <div class="author">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="avatar" src="{{ asset('storage/profile/1642772392.jpg') }}" alt="">
                        </div>
                        <div class="col-md-5">
                            <div class="info">
                                {{ Auth()->user()->name }}<br>
                                <div class="text-muted"> <small>{{ Auth()->user()->email }}</small></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="edit">
                                <a type="button" class="btn btn-dark"
                                    href="{{ url('/profile/' . auth()->user()->id) }}"><small>Update Profile</small></a>
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

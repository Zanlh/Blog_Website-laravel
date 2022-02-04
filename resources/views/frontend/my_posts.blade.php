@extends('frontend.layouts.app')
@section('active', 'profile-active')
@section('title', 'my post')
@section('name')
@section('content')
    <div class="my-profile">
        @foreach ($posts as $post)
            {{-- ================================================================== --}}
            @php
                $post_photos = $post->photos
                    ->where('type', 3)
                    ->pluck('path')
                    ->toArray();
                $post_photos_ary = [];
                foreach ($post_photos as $photo) {
                    $post_photos_ary[] = asset('storage/posts/' . $photo);
                }
                $post_photos = implode(',', $post_photos_ary);
            @endphp
            {{-- ================================================================== --}}
            <div class="card post-card">
                {{-- <input type="hidden" id="custId" name="post_id" value="{{$post->id}}"> --}}
                <div class="profile">
                    <div class="profile-photo ml-4 mt-4">
                        <div class="avatar">
                            @if ($profile_photo == null)
                                <img class="avatar"
                                    src="https://ui-avatars.com/api/?size=100&name={{ $user->name }}" alt="...">
                            @else
                                <img class="avatar" src="{{ asset('storage/profile/' . $profile_photo->path) }}"
                                    alt="...">
                            @endif
                        </div>
                    </div>
                    <h3 class="card-title text-bold mb-0 mt-4">{{ $user->name }}</h3>
                    <div style="position:absolute; left:550px; top:20px;">
                        <div class="dropdown dropleft">
                            <a class="" style="color: dark" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-ellipsis-v  text-dark"></i>
                            </a>
                            <div class="dropdown-menu pl-1" aria-labelledby="dropdownMenuLink">
                                {{-- TODO: Edit with dropzone plugin --}}
                                <a href="" class="dropdown-item"> <small> Edit
                                        Post</small></a>
                                <a href="" class="dropdown-item"> <small> Save Post</small></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <div class="gallery" data-images="{{ $post_photos }}">
                    </div>
                </div>

                <div class="card-body">
                    <h3 class="card-title text-bold mb-0">{{ $post->title }} </h3>
                    <small class="text-muted">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                    <p class="card-text mt-3">{{ $post->content }}</p>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.gallery').each(function(index) {
                var images = $(this).data('images');
                var images_ary = images.split(',');
                $(this).imagesGrid({
                    images: images_ary,
                    // algin images with different sizes
                    align: true,
                    // max grid cells (1-6)
                    cells: 4,
                });
            });
        });
    </script>

@endsection

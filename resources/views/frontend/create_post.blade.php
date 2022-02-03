@extends('frontend.layouts.app')
@section('title', 'create post')
@section('name')
@section('content')

    <div class="create-post">
        <div class="card">
            <div class="image text-center">
                <img src="{{ asset('frontend/images/post.png') }}">
            </div>

            <div class="card-body">
                <form class="form " action="{{ url('/create-post/store') }}" method="post" id="update" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Category</label>
                                <select name="category" class="category form-control">
                                    <option value=""></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea type="text" class="form-control @error('content') is-invalid @enderror"
                            name="content"></textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- TODO: Upload images with dropzone plugin --}}
                        <label for="exampleFormControlFile1">Photos</label>
                        <input type="file"  accept="image/*" class="form-control" name="post_photos[]" multiple>
                    </div>
                    <button class="btn btn-dark back-btn" onclick="window.history.go(-1); return false;"
                        style="margin-left: 270px">Cancle</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.category').select2({
                theme: 'bootstrap4',
                placeholder: "Choose Catrgory",
                allowClear: true
            });
        });
    </script>

@endsection

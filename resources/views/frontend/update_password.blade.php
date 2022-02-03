@extends('frontend.layouts.app')
@section('title', 'edit password')
@section('name')
@section('content')

    <div class="edit-profile">
        <div class="card">
            <div class="card-body">
                <form class="form " action="{{ url('/update/password/store') }}" method="post" id="update"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Old Password </label>
                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Enter Old Password">
                        @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="Enter New Password">
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button class="btn btn-dark back-btn" onclick="window.history.go(-1); return false;" style="margin-left: 270px">Cancle</button>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        
    });
</script>
    {{-- {!! JsValidator::formRequest('App\Http\Requests\UpdateUserProfile','#update') !!} --}}

@endsection

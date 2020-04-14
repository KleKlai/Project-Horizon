@extends('layouts.app')

@section('css')
<!-- dropify -->
    <link href="{{ asset('admin/assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
            </div>
            <h4 class="page-title">My Profile</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h3 class="m-t-0 header-title mb-3">Basic Details</h3>

            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <img src="/storage/profile/{{ Auth::user()->profile ?? 'default-avatar.png' }}"
                    class="rounded-circle avatar-xl img-thumbnail mb-4 mx-auto d-block" alt="profile-image">

                    <form action="{{ route('profile.update', $user) }}" method="POST" role="form" enctype="multipart/form-data" class="form-horizontal">

                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" class="dropify @error('profile') is-invalid @enderror" name="profile" data-height="80" />

                            @if($errors->has('profile'))
                                <span class="form-text text-danger" role="alert">
                                    <strong>{{ $errors->first('profile') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror text-capitalize"
                            value="{{ old('name', $user->name) }}" id="name" name="name" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}" id="email" name="email" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info waves-effect waves-light mr-2">Save Changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h3 class="m-t-0 header-title mb-4">Change Password</h3>
            <div class="row justify-content-center">
                <div class="col-sm-4">

                    <form class="form-horizontal" action="{{ route('password.update') }}" method="POST" role="form">

                        @csrf
                        <div class="form-group row">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="New password" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm new password" required>
                            <small class="text-muted"><b>Tip: </b>It's a good idea to use a strong password that you're not using elsewhere</small>
                        </div>
                        <div class="form-group text-center">
                                <button type="submit" class="btn btn-info waves-effect waves-light mr-2">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- dropify js -->
    <script src="{{ asset('admin/assets/libs/dropify/dropify.min.js') }}"></script>

<!-- form-upload init -->
    <script src="{{ asset('admin/assets/js/pages/form-fileupload.init.js') }}"></script>
@endsection

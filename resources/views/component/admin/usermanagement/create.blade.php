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
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User Management</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
            <h4 class="page-title">Create User</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-md-12">
        <div class="card-box">

            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <label>Profile Picture <small class="text-muted">(Optional)</small></label>
                            <input type="file" class="dropify @error('profile') is-invalid @enderror" name="profile" data-height="80" />

                            @if($errors->has('profile'))
                                <span class="form-text text-danger" role="alert">
                                    <strong>{{ $errors->first('profile') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label for="role" class="col-form-label">Role</label>
                            <select id="role" class="form-control" name="role">
                                    <option selected=''>-</option>
                                    @foreach($role as $roles)
                                        <option value="{{ $roles->id }}">{{ $roles->name }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Sign in</button>
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

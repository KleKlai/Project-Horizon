@extends('layouts.app')

@section('title', 'Confirm Password')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Authorization</li>
                </ol>
            </div>
            <h4 class="page-title">Security Check</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h3 class="m-t-0 text-center mb-4">Confirm password to continue</h3>

            <div class="row justify-content-center">
                <div class="col-sm-5">
                    <form method="POST" action="{{ route('password.confirm') }}" class="form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label for="concern">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <small id="concern" class="form-text text-muted">You are entering secured page. We won’t ask for your password again for a few hours.</small>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mt-4 justify-content-center">
                            <button type="submit" id="btnsubmit" class="btn btn-success waves-effect waves-light">
                                <i class="mdi mdi-shield-check-outline"></i>
                                Confirm Password
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

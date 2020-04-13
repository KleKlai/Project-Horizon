@extends('layouts.app')

@section('title', 'Change Password')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="row justify-content-center">
                <div class="col-sm-6">

                    <form class="form-horizontal" action="{{ route('new.password') }}" method="POST" role="form">

                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="New password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm new password" required>
                                <small class="text-muted"><b>Tip: </b>It's a good idea to use a strong password that you're not using elsewhere</small>
                            </div>
                        </div>
                        <div class="form-group mb-0 justify-content-end row">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-info waves-effect waves-light mr-2">Save Changes</button>
                                @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class=" btn-link ml-1">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

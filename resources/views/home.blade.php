@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        </div>
    </div>
</div>
@endsection

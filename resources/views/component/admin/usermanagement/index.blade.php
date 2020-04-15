@extends('layouts.app')

@section('title', 'User Management')

@section('css')
<!-- Tablesaw css -->
    <link href="{{ asset('admin/assets/libs/tablesaw/tablesaw.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">User Management</li>
                </ol>
            </div>
            <h4 class="page-title">User Managament</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card-box">

            <table class="tablesaw table mb-0" data-tablesaw-mode="columntoggle">
                <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">#</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">Name</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">E-mail</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Roles</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Action</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($user as $key => $users)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->roles()->get()->pluck('name')->first() }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $users) }}" method="POST">

                                    {{--  '@csrf' Verify if the form send by the user is came from server  --}}
                                    {{--  '{{ method_field('DELETE') }}' To change the http method  --}}

                                    @csrf
                                    {{ method_field('DELETE') }}

                                    <a href="{{ route('users.edit', $users) }}" class="btn btn-link">Edit</button>
                                    <button type="submit" data-id="{{$users->id}}" class="btn btn-danger btn-xs ml-2 delete-confirm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Tablesaw js -->
    <script src="{{ asset('admin/assets/libs/tablesaw/tablesaw.js') }}"></script>

<!-- Init js -->
    <script src="{{ asset('admin/assets/js/pages/tablesaw.init.js') }}"></script>
@endsection

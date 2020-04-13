@extends('layouts.app')

@section('title', 'User Management')

@section('css')
<!-- Tablesaw css -->
    <link href="{{ asset('admin/assets/libs/tablesaw/tablesaw.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="mt-0 header-title"><b>User Management</b></h4>

            <table class="tablesaw table mb-0" data-tablesaw-mode="columntoggle">
                <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">#</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">Name</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Username</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Roles</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Maynard Magallen</td>
                        <td>mmagallen</td>
                        <td>System Administrator</td>
                        <td>
                            <form action="#deleteAction" method="POST">

                                {{--  '@csrf' Verify if the form send by the user is came from server  --}}
                                {{--  '{{ method_field('DELETE') }}' To change the http method  --}}

                                @csrf
                                {{ method_field('DELETE') }}

                                <a href="#editBtn" class="btn btn-link">Edit</button>
                                <button type="submit" class="btn btn-danger btn-xs ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
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

@extends('layouts.app')

@section('css')
<!-- Tablesaw css -->
    <link href="{{ asset('admin/assets/libs/tablesaw/tablesaw.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Dashboard</h4>


        </div>
    </div>
</div>

<div class="row">
    <div class="col-3">
        <div class="card-box widget-user">
            <div class="text-center">
                <h2 class="font-weight-normal text-primary" data-plugin="counterup">{!! $users_count !!}</h2>
                <h5><a href="{{ route('users.index') }}">Employees</a></h5>
            </div>
        </div>

        <div class="card-box widget-user">
            <div class="text-center">
                <h2 class="font-weight-normal text-danger" data-plugin="counterup">{!! $record_count !!}</h2>
                <h5>Report Analytics</h5>
            </div>
        </div>

        <div class="card-box widget-user">
            <div class="text-center">
                <h2 class="font-weight-normal text-warning" data-plugin="counterup">{!! $verification_count !!}</h2>
                <h5>Pending Validation</h5>
            </div>
        </div>

        <div class="card-box widget-user">
            <div class="text-center">
                <h2 class="font-weight-normal text-success" data-plugin="counterup">{!! $done_count !!}</h2>
                <h5>Report Completed</h5>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="card-box">
            <h4 class="mb-2">Latest Activity Log</h4>

            <table class="tablesaw table mb-0" data-tablesaw-mode="columntoggle">
                <colgroup>
                    <col span="1" style="width: 3%;">
                    <col span="1" style="width: 25%;">
                    <col span="1" style="width: 5%;">
                    <col span="1" style="width: auto;">
                    <col span="1" style="width: 8%;">
                </colgroup>
                <thead class="text-center">
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">#</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Date</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">User</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">Action</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Name</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($activity_log as $log)
                        <tr>
                            <td>{!! $log->id !!}</td>
                            <td>{!! $log->created_at->format('F d, Y h:i A') !!}</td>
                            <td>{!! $log->causer_id !!}</td>
                            <td>{!! $log->description !!}</td>
                            <td>{!! $log->log_name !!}</td>
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

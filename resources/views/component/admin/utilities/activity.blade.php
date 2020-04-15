@extends('layouts.app')

@section('title', 'Activity Log')

@section('css')
<!-- third party css -->
        <link href="{{ asset('admin/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<!-- third party css end -->
@endsection

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Activity Log</li>
                </ol>
            </div>
            <h4 class="page-title">Activity Log</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <table id="key-table" class="table table-bordered dt-responsive nowrap">
                <colgroup>
                    <col span="1" style="width: 3%;">
                    <col span="1" style="width: 10%;">
                    <col span="1" style="width: 5%;">
                    <col span="1" style="width: 10%;">
                    <col span="1" style="width: auto;">
                    <col span="1" style="width: 5%;">
                    <col span="1" style="width: 5%;">
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date Time</th>
                        <th>User</th>
                        <th>Name</th>
                        <th>Action</th>
                        <th>Item Type</th>
                        <th>Affected</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($log as $activity)
                    <tr>
                        <td>{!! $activity->id !!}</td>
                        <td>{!! $activity->created_at->format('M d, Y h:i A') !!}</td>
                        <td>{!! $activity->causer_id !!}</td>
                        <td>{!! $activity->log_name !!}</td>
                        <td>{!! $activity->description !!}</td>
                        <td>{!! $activity->subject_type !!}</td>
                        <td>{!! $activity->subject_id !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')

<!-- third party js -->
        <script src="{{ asset('admin/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/pdfmake/vfs_fonts.js') }}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
        <script src="{{ asset('admin/assets/js/pages/datatables.init.js') }}"></script>
@endsection

@extends('layouts.app')

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
                    @can('sys_admin_rights')
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    @endcan
                    <li class="breadcrumb-item active">Record</li>
                </ol>
            </div>
            <h4 class="page-title">Record</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-md-12">
        <div class="card-box">

            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                <colgroup>
                    <col span="1" style="width: 5%;">
                    <col span="1" style="width: 10%;">
                    <col span="1" style="width: 5%;">
                    <col span="1" style="width: auto;">
                    <col span="1" style="width: 8%;">
                    <col span="1" style="width: 15%;">
                </colgroup>
                <thead>
                    <tr>
                        <th>Control Number</th>
                        <th>Status</th>
                        <th>Source</th>
                        <th>Department/Region</th>
                        <th>Due Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($record as $case)
                        <tr>
                            <td>{!! $case->control_no !!}</td>
                            <td class="text-center"><span class="badge badge-{!! $case->status_color !!}">{!! $case->status !!}</span></td>
                            <td>{!! $case->source !!}</td>
                            <td>{!! Str::limit($case->department_region, 30) !!}</td>
                            <td>{!! $case->deadline !!} Days</td>
                            <td>
                                <a href="{{ route('record.show', $case) }}" class="btn-link">
                                    <i class="mdi mdi-fullscreen"></i>
                                    View
                                </a>
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

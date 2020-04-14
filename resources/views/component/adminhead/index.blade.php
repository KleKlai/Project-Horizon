@extends('layouts.app')

@section('title', 'Admin Head Section')

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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Adminto</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Components</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Datatables</li>
                </ol>
            </div>
            <h4 class="page-title">Datatables</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h3 class="header-title mt-0 mb-3">Documents Details</h3>

            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                <colgroup>
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 5%;">
                    <col span="1" style="width: auto;">
                    <col span="1" style="width: 5%;">
                </colgroup>
                <thead>
                    <tr>
                        <th>Control Number</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CTL-123456-GG</td>
                        <td><span class="badge badge-success">Validate</span></td>
                        <td>Test</td>
                        <td><a href="#view"><i class="mdi mdi-fullscreen"></i> View</a></td>
                    </tr>
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

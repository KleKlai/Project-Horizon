@extends('layouts.app')

@section('title', 'Cheif of Staff Section')

@section('css')
<!-- third party css -->
        <link href="{{ asset('admin/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<!-- third party css end -->

<!-- Custom box css -->
        <link href="{{ asset('admin/assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h3 class="header-title mt-0 mb-3">Documents Details</h3>

            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                <colgroup>
                    <col span="1" style="width: 20%;">
                    <col span="1" style="width: 5%;">
                    <col span="1" style="width: auto;">
                    <col span="1" style="width: 8%;">
                    <col span="1" style="width: 15%;">
                </colgroup>
                <thead>
                    <tr>
                        <th>Control Number</th>
                        <th>Status</th>
                        <th>Assigned Person</th>
                        <th>Due Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CTL-123456-GG</td>
                        <td class="text-center"><span class="badge badge-success">NEW</span></td>
                        <td>Maynard Magallen</td>
                        <td>3 Days</td>
                        <td>
                            <a href="#import-data" class="btn btn-success waves-effect waves-light"
                            data-animation="rotate" data-plugin="custommodal" data-overlayColor="#36404a">
                                <i class="mdi mdi-cube-send"></i>
                                Assign
                            </a>
                            <a href="#showBtn" class="btn btn-link waves-effect waves-light">
                                <i class="mdi mdi-fullscreen"></i>
                                View
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="import-data" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Assign Document</h4>
    <div class="custom-modal-text">
        <div class="col-md-12 text-center">
            <form action="#assign" method="POST">
                @csrf

                <select class="custom-select mb-3" name="person">
                    <option selected="">-</option>
                </select>

                <button type="submit" class="btn btn-success waves-effect width-md waves-light ">Assign</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Modal-Effect -->
        <script src="{{ asset('admin/assets/libs/custombox/custombox.min.js') }}"></script>

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

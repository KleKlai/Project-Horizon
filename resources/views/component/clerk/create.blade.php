@extends('layouts.app')

@section('css')
<!-- Plugins css -->
    <link href="{{ asset('admin/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets/libs/multiselect/multi-select.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/libs/switchery/switchery.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/libs/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

<!-- dropify -->
    <link href="{{ asset('admin/assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
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
                    <li class="breadcrumb-item"><a href="{{ route('record.index') }}">Receiving</a></li>
                    <li class="breadcrumb-item active">New Record</li>
                </ol>
            </div>
            <h4 class="page-title">New Record</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card-box">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('record.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="row form-group">

                    <div class="form-group col-12 col-md-2">
                        <label>Source</label>

                        <select class="form-control @error('source') is-invalid @enderror" name="source" required autocomplete="off" required>
                            <option value="" selected>Select</option>
                            <option value="Main Office"
                            {{ old('source') == 'Main Office' ? 'selected' : '' }}>Main Office</option>
                            <option value="Field Office"
                            {{ old('source') == 'Field Office' ? 'selected' : '' }}>Field Office</option>
                            <option value="Various Courts"
                            {{ old('source') == 'Various Courts' ? 'selected' : '' }}>Various Courts</option>
                            <option value="Other Agencies"
                            {{ old('source') == 'Other Agencies' ? 'selected' : '' }}>Other Agencies</option>
                            <option value="Others"
                            {{ old('source') == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>

                        @error('source')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-2">
                        <label>Deadline</label>
                        <input type="number" name="deadline" class="form-control @error('deadline') is-invalid @enderror"  value="{{ old('deadline') }}" autocomplete="off" required>

                        @error('deadline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-2">
                        <label>Pages</label>
                        <input type="number" name="pages" class="form-control @error('pages') is-invalid @enderror"  value="{{ old('pages') }}" autocomplete="off" required>

                        @error('pages')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-3">
                        <label>Document Type</label>

                        <select class="form-control select2 @error('document_type') is-invalid @enderror" name="document_type" required>
                            <option value="" selected>Select</option>
                            <option value="Memorandum"
                            {{ old('document_type') == 'Memorandum' ? 'selected' : '' }}>Memorandum</option>
                            <option value="Letter/Request"
                            {{ old('document_type') == 'Letter/Request' ? 'selected' : '' }}>Letter/Request</option>
                            <option value="Subpoena"
                            {{ old('document_type') == 'Subpoena' ? 'selected' : '' }}>Subpoena</option>
                            <option value="Resolution/Minute Resolution"
                            {{ old('document_type') == 'Resolution/Minute Resolution' ? 'selected' : '' }}>Resolution/Minute Resolution</option>
                            <option value="Certification"
                            {{ old('document_type') == 'Certification' ? 'selected' : '' }}>Certification</option>
                            <option value="Appointment"
                            {{ old('document_type') == 'Appointment' ? 'selected' : '' }}>Appointment</option>
                            <option value="Clearance"
                            {{ old('document_type') == 'Clearance' ? 'selected' : '' }}>Clearance</option>
                            <option value="Newspaper"
                            {{ old('document_type') == 'Newspaper' ? 'selected' : '' }}>Newspaper</option>
                        </select>

                        @error('document_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-3">
                        <label>Document Type</label>

                        <select class="form-control select2 @error('document_type') is-invalid @enderror" name="document_type" required>
                            <option value="" selected>Select</option>
                            <option value="Memorandum"
                            {{ old('document_type') == 'Memorandum' ? 'selected' : '' }}>Memorandum</option>
                            <option value="Letter/Request"
                            {{ old('document_type') == 'Letter/Request' ? 'selected' : '' }}>Letter/Request</option>
                            <option value="Subpoena"
                            {{ old('document_type') == 'Subpoena' ? 'selected' : '' }}>Subpoena</option>
                            <option value="Resolution/Minute Resolution"
                            {{ old('document_type') == 'Resolution/Minute Resolution' ? 'selected' : '' }}>Resolution/Minute Resolution</option>
                            <option value="Certification"
                            {{ old('document_type') == 'Certification' ? 'selected' : '' }}>Certification</option>
                            <option value="Appointment"
                            {{ old('document_type') == 'Appointment' ? 'selected' : '' }}>Appointment</option>
                            <option value="Clearance"
                            {{ old('document_type') == 'Clearance' ? 'selected' : '' }}>Clearance</option>
                            <option value="Newspaper"
                            {{ old('document_type') == 'Newspaper' ? 'selected' : '' }}>Newspaper</option>
                        </select>

                        @error('document_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">

                    <div class="form-group col-12 col-md-5">
                        <label>Department</label>

                        <select class="form-control select2 @error('department_region') is-invalid @enderror" name="department_region" required>
                            <option value="" selected>Select</option>
                            <option value="Office of the Chairman"
                            {{ old('department_region') == 'Office of the Chairman' ? 'selected' : '' }}>Office of the Chairman</option>
                            <option value="Office of the Commissioner - COMCC-1"
                            {{ old('department_region') == 'Office of the Commissioner - COMCC-1' ? 'selected' : '' }}>Office of the Commissioner - COMCC-1</option>
                            <option value="Office of the Commissioner - COMCC-2"
                            {{ old('department_region') == 'Office of the Commissioner - COMCC-2' ? 'selected' : '' }}>Office of the Commissioner - COMCC-2</option>
                            <option value="Office of the Commissioner - COMCC-3"
                            {{ old('department_region') == 'Office of the Commissioner - COMCC-3' ? 'selected' : '' }}>Office of the Commissioner - COMCC-3</option>
                            <option value="Office of the Commissioner - COMCC-4"
                            {{ old('department_region') == 'Office of the Commissioner - COMCC-4' ? 'selected' : '' }}>Office of the Commissioner - COMCC-4</option>
                            <option value="Office of the Commissioner - COMCC-5"
                            {{ old('department_region') == 'Office of the Commissioner - COMCC-5' ? 'selected' : '' }}>Office of the Commissioner - COMCC-5</option>
                            <option value="Office of the Commissioner - COMCC-6"
                            {{ old('department_region') == 'Office of the Commissioner - COMCC-6' ? 'selected' : '' }}>Office of the Commissioner - COMCC-6</option>
                            <option value="Office of the Clerk of the Commission"
                            {{ old('department_region') == 'Office of the Clerk of the Commission' ? 'selected' : '' }}>Office of the Clerk of the Commission</option>
                            <option value="Office of the Secretary to the Commission"
                            {{ old('department_region') == 'Office of the Secretary to the Commission' ? 'selected' : '' }}>Office of the Secretary to the Commission</option>
                            <option value="Office of the Executive Director"
                            {{ old('department_region') == 'Office of the Executive Director' ? 'selected' : '' }}>Office of the Executive Director</option>
                            <option value="Office of the Deputy Executive Director for Operations"
                            {{ old('department_region') == 'Office of the Deputy Executive Director for Operations' ? 'selected' : '' }}>Office of the Deputy Executive Director for Operations</option>
                            <option value="Office of the Deputy Executive Director for Adminstration"
                            {{ old('department_region') == 'Office of the Deputy Executive Director for Adminstration' ? 'selected' : '' }}>Office of the Deputy Executive Director for Adminstration</option>
                            <option value="Electoral Contest and Adjudication Department"
                            {{ old('department_region') == 'Electoral Contest and Adjudication Department' ? 'selected' : '' }}>Electoral Contest and Adjudication Department</option>
                            <option value="Planning Department"
                            {{ old('department_region') == 'Planning Department' ? 'selected' : '' }}>Planning Department</option>
                            <option value="Adminstrative Services Department"
                            {{ old('department_region') == 'Adminstrative Services Department' ? 'selected' : '' }}>Adminstrative Services Department</option>
                            <option value="Personnel Department"
                            {{ old('department_region') == 'Personnel Department' ? 'selected' : '' }}>Personnel Department</option>
                            <option value="Finance Services Department"
                            {{ old('department_region') == 'Finance Services Department' ? 'selected' : '' }}>Finance Services Department</option>
                            <option value="Education and Information Department"
                            {{ old('department_region') == 'Education and Information Department' ? 'selected' : '' }}>Education and Information Department</option>
                            <option value="Election and Barangay Affairs Department"
                            {{ old('department_region') == 'Election and Barangay Affairs Department' ? 'selected' : '' }}>Election and Barangay Affairs Department</option>
                            <option value="Election Records and Statistic Department"
                            {{ old('department_region') == 'Election Records and Statistic Department' ? 'selected' : '' }}>Election Records and Statistic Department</option>
                            <option value="Information Technology Department"
                            {{ old('department_region') == 'Information Technology Department' ? 'selected' : '' }}>Information Technology Department</option>
                            <option value="Law Department"
                            {{ old('department_region') == 'Law Department' ? 'selected' : '' }}>Law Department</option>
                            <option value="Bids and Awards Commitee"
                            {{ old('department_region') == 'Bids and Awards Commitee' ? 'selected' : '' }}>Bids and Awards Commitee</option>
                            <option value="Office for Overseas Voting"
                            {{ old('department_region') == 'Office for Overseas Voting' ? 'selected' : '' }}>Office for Overseas Voting</option>
                            <option value="Campaign Finance Office"
                            {{ old('department_region') == 'Campaign Finance Office' ? 'selected' : '' }}>Campaign Finance Office</option>
                            <option value="Comittee on Detainee Voting"
                            {{ old('department_region') == 'Comittee on Detainee Voting' ? 'selected' : '' }}>Comittee on Detainee Voting</option>
                            <option value="Internal Audit Office"
                            {{ old('department_region') == 'Internal Audit Office' ? 'selected' : '' }}>Internal Audit Office</option>
                            <option value="Committee on the Ban on Firearms and Security Personnel"
                            {{ old('department_region') == 'Committee on the Ban on Firearms and Security Personnel' ? 'selected' : '' }}>Committee on the Ban on Firearms and Security Personnel</option>
                            <option value="All Department/Office"
                            {{ old('department_region') == 'All Department/Office' ? 'selected' : '' }}>All Department/Office</option>
                        </select>

                        @error('department_region')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-3">
                        <label>Manner of Receipt</label>

                        <select class="form-control @error('manner_of_receipt') is-invalid @enderror" name="manner_of_receipt" required>
                            <option value="" selected>Select</option>
                            <option value="Hand-Delivered"
                            {{ old('manner_of_receipt') == 'Hand-Delivered' ? 'selected' : '' }}>Hand-Delivered</option>
                            <option value="Fax"
                            {{ old('manner_of_receipt') == 'Fax' ? 'selected' : '' }}>Fax</option>
                            <option value="E-Mail"
                            {{ old('manner_of_receipt') == 'E-Mail' ? 'selected' : '' }}>E-Mail</option>
                            <option value="Mail (Courier Service)"
                            {{ old('manner_of_receipt') == 'Mail (Courier Service)' ? 'selected' : '' }}>Mail (Courier Service)</option>
                        </select>

                        @error('manner_of_receipt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-4">
                        <label>Office/Province</label>

                        <select class="form-control select2 @error('office_province') is-invalid @enderror" name="office_province" required>
                            <option value="" selected>Select</option>
                            <option value="Region XI">Region XI</option>
                        </select>

                        @error('office_province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">

                    <div class="form-group col-12 col-md-8">
                        <label>Attachment Description</label>

                        <textarea id="textarea" class="form-control @error('description') is-invalid @enderror" name="description" maxlength="300" rows="5"></textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-4">
                        <label>Attachment</label>
                        <input type="file" class="dropify @error('attachment') is-invalid @enderror" name="attachment" data-height="100" />

                        @if($errors->has('attachment'))
                            <span class="form-text text-danger" role="alert">
                                <strong>{{ $errors->first('attachment') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="text-right m-t-30">
                    <button type="submit" class="btn btn-success waves-effect waves-light">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Plugins Js -->
    <script src="{{ asset('admin/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/multiselect/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/jquery-quicksearch/jquery.quicksearch.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/jquery-mask-plugin/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

<!-- Init js-->
    <script src="{{ asset('admin/assets/js/pages/form-advanced.init.js') }}"></script>

<!-- dropify js -->
    <script src="{{ asset('admin/assets/libs/dropify/dropify.min.js') }}"></script>

<!-- form-upload init -->
    <script src="{{ asset('admin/assets/js/pages/form-fileupload.init.js') }}"></script>
@endsection

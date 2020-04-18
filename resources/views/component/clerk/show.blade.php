@extends('layouts.app')

@section('css')
<!-- dropify -->
    <link href="{{ asset('admin/assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Custom box css -->
    <link href="{{ asset('admin/assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">

<!--venobox lightbox-->
    <link href="{{ asset('admin/assets/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
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
                    <li class="breadcrumb-item"><a href="javascript:goBack();">Record</a></li>
                    <li class="breadcrumb-item active">Record Details</li>
                </ol>
            </div>
            <h4 class="page-title">Record Details</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">

        {{-- Display for any errors  --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @canany(['sys_admin_rights', 'admin_head_rights'])
            @if(strtolower($record->status) != 'done')
                <div class="btn-group mb-1 d-flex justify-content-center">
                    <a href="{{ route('adminhead.approved', $record->id) }}" class="btn btn-success waves-effect"><i class="mdi mdi-thumb-up"></i> Approved </a>
                    <a href="#record_reject" class="btn btn-warning waves-effect" data-animation="rotate" data-plugin="custommodal" data-overlayColor="#36404a">
                        <i class="mdi mdi-thumb-down"></i>
                        Disapproved
                    </a>
                </div>
            @endif
        @endcan

    {{-- Record Information  --}}
        <div class="card-box">

            @can('sys_admin_rights')
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-file-document-edit-outline"></i> Edit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-archive"></i> Archive</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete-sweep"></i> Delete</a>
                    </div>
                </div>
            @endcan

            <div class="badge badge-{{ $record->status_color }} float-left font-15">{!! $record->status !!}</div>

            <div class="form-row mt-4">
                <div class="form-group col-md-3">
                    <label for="inputEmail4" class="col-form-label">Control Number</label>
                    <input type="text" class="form-control" value="{!! $record->control_no !!}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEmail4" class="col-form-label">Received Date</label>
                    <input type="text" class="form-control" value="{!! $record->received_date !!}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEmail4" class="col-form-label">Received Time</label>
                    <input type="text" class="form-control" value="{!! $record->received_time !!}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEmail4" class="col-form-label">Due Date</label>
                    <input type="text" class="form-control" value="{!! $record->deadline !!}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4" class="col-form-label">Source</label>
                    <input type="text" class="form-control" value="{!! $record->source !!}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputEmail4" class="col-form-label">Document Type</label>
                    <input type="text" class="form-control" value="{!! $record->document_type !!}" disabled>
                </div>
                <div class="form-group col-md-5">
                    <label for="inputEmail4" class="col-form-label">Department/Region</label>
                    <input type="text" class="form-control" value="{!! $record->department_region !!}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEmail4" class="col-form-label">Manner of Receipt</label>
                    <input type="text" class="form-control" value="{!! $record->manner_of_receipt !!}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4" class="col-form-label">Office/Province</label>
                    <input type="text" class="form-control" value="{!! $record->office_province !!}" disabled>
                </div>
            </div>


            @canany(['sys_admin_rights', 'cos_rights'])
                <form action="{{ route('cos.assign', $record) }}" method="POST" id="assign_attorney">

                    @csrf
                    <div class="row form-group">

                        <div class="form-group col-12 col-md-2">
                            <label>Assigned Attorney</label>

                            <select class="form-control @error('attorney') is-invalid @enderror" name="attorney" required autocomplete="off" required>
                                <option value="" selected>-</option>
                                @foreach($attorney as $person)

                                    <option value="{!! $person->id !!}"
                                        {{ ($record->attorney()->pluck('attorney_id')->first() == $person->id) ? 'Selected' : '' }}>
                                        {!! $person->name !!}
                                    </option>

                                @endforeach
                            </select>

                            @error('attorney')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-1">
                            <label>Due Date</label>

                            <input type="number" class="form-control @error('attorney_duedate') is-invalid @enderror"
                            value="{{ old('attorney_duedate', $record->attorney()->pluck('due_date')->first()) }}" name="attorney_duedate" id="attorney_duedate">

                            @error('attorney_duedate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </form>

            @endcan

            <div class="task-tags mt-2">
                <h5>Description</h5>
                <div class="bootstrap-tagsinput">{!! $record->description !!}</div>
            </div>

            <div class="attached-files mt-4">
                <h5>Attached File </h5>
                {{-- {{ dd($record->getMedia('document')) }} --}}
                <ul class="list-inline files-list">
                    @foreach($record->getMedia('document') as $data)
                        <li class="list-inline-item file-box">
                            <a href="{{ asset('storage\\'). $data->order_column . '\\' . $data->file_name }}" class="image-popup" title="{{ $data->file_name }}">

                                @if(!in_array($data->mime_type, ['image/jpeg','image/png'], true))
                                    <img src="{{ asset('admin/assets/images/vector/file.png') }}" class="img-fluid img-thumbnail" alt="attached-img" width="80">
                                @else

                                    <img src="{{ asset('storage\\'). $data->order_column . '\\' . $data->file_name }}" class="img-fluid img-thumbnail" alt="attached-img" width="100">
                                @endif
                            </a>
                            <p class="font-13 mb-1 text-muted">
                                <a href="{{ asset('storage\\'). $data->order_column . '\\' . $data->file_name }}" download>
                                    <span class="badge badge-info">Download <i class="mdi mdi-download"></i></span>
                                </a>
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="text-right m-t-30">

                    @if(strtolower($record->status) != 'done')
                        @canany(['sys_admin_rights','cos_rights'])
                            <input type="submit" class="btn btn-success waves-effect waves-light" form="assign_attorney" value="{{ (empty($record->attorney()->pluck('record_id')->first())) ? 'Assign' : 'Reassign' }}"/>
                        @endcan

                        @if(!empty($record->attorney['id']))
                            @canany(['sys_admin_rights','lawyer_rights'])
                                <a href="#upload-resolution" class="btn btn-warning waves-effect" data-animation="rotate" data-plugin="custommodal" data-overlayColor="#36404a">
                                    <i class="mdi mdi-upload"></i> {{ ($record->submission == true) ? 'Reupload' : 'Upload' }}
                                </a>
                            @endcan
                        @endif
                    @endif

                    </div>
                </div>
            </div>

        </div>

    {{-- Resolution Upload  --}}

        @if($record->submission == true)

        <div class="card-box">

            <h4 class="card-title">Resolution <small class="ml-1 text-muted">about {{ $record->resolution['created_at']->diffForHumans() }}</small></h4>

            <div class="task-tags mt-2">

                <div class="row">
                    <div class="col-2 attached-files">
                        <h5>Attached File </h5>
                        <ul class="list-inline files-list">
                            <li class="list-inline-item file-box">
                                <a href="{{ route('attorney.resolution.download', $record->resolution['id']) }}">
                                <img src="{{ asset('admin/assets/images/file_type_images/word.png') }}"
                                class="img-fluid img-thumbnail" alt="attached-img" width="80"
                                data-toggle="tooltip" data-placement="top" title="{{ $record->resolution['attachment'] }}"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-10 task-tags">
                        <h5>Remarks</h5>
                        <div class="bootstrap-tagsinput">{!! $record->resolution['remarks'] !!}</div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($record->disapproved_remark != null)
            <div class="card-box">
                <div class="task-tags mt-2">
                    <h5>Dispparoved Remark</h5>
                    <div class="bootstrap-tagsinput">{!! $record->disapproved_remark !!}</div>
                </div>
            </div>
        @endif

    </div>
</div>

@include('component.clerk.modal')
@endsection

@section('script')
<!-- dropify js -->
    <script src="{{ asset('admin/assets/libs/dropify/dropify.min.js') }}"></script>

<!-- form-upload init -->
    <script src="{{ asset('admin/assets/js/pages/form-fileupload.init.js') }}"></script>

<!-- Modal-Effect -->
    <script src="{{ asset('admin/assets/libs/custombox/custombox.min.js') }}"></script>

<!-- isotope filter plugin -->
    <script src="{{ asset('admin/assets/libs/isotope/isotope.pkgd.min.js') }}"></script>

<!--venobox lightbox-->
    <script src="{{ asset('admin/assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

<!-- Gallery Init-->
    <script src="{{ asset('admin/assets/js/pages/gallery.init.js') }}"></script>
@endsection

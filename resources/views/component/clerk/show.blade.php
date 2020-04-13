@extends('layouts.app')

@section('title', 'Receiving Section')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card-box project-box">
            <div class="badge badge-success float-right font-13">NEW</div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:goBack();">Receiving</a></li>
                <li class="breadcrumb-item active">Show</li>
            </ol>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4" class="col-form-label">Control Number</label>
                    <input type="text" class="form-control" value="CTL-123456-GG" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEmail4" class="col-form-label">Received Date</label>
                    <input type="text" class="form-control" value="April 1, 2020" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEmail4" class="col-form-label">Received Time</label>
                    <input type="text" class="form-control" value="4:00 PM" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEmail4" class="col-form-label">Due Date</label>
                    <input type="text" class="form-control" value="April 17, 2020" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4" class="col-form-label">Source</label>
                    <input type="text" class="form-control" value="Source Code" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputEmail4" class="col-form-label">Document Type</label>
                    <input type="text" class="form-control" value="jpg" disabled>
                </div>
                <div class="form-group col-md-5">
                    <label for="inputEmail4" class="col-form-label">Department/Region</label>
                    <input type="text" class="form-control" value="Department of Health" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEmail4" class="col-form-label">Manner of Receipt</label>
                    <input type="text" class="form-control" value="Email" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4" class="col-form-label">Office/Province</label>
                    <input type="text" class="form-control" value="Region XI Office" disabled>
                </div>
            </div>

            <div class="task-tags mt-2">
                <h5>Description</h5>
                <div class="bootstrap-tagsinput">Description Here</div>
            </div>

            <div class="attached-files mt-4">
                <h5>Attached File </h5>
                <ul class="list-inline files-list">
                    <li class="list-inline-item file-box">
                        <a href=""><img src="{{ asset('admin/assets/images/file_type_images/word.png') }}" class="img-fluid img-thumbnail" alt="attached-img" width="80"></a>
                        <p class="font-13 mb-1 text-muted"><small>File Link</small></p>
                    </li>
                </ul>
            </div>

            <h5 class="mt-4">Progress <span class="text-success float-right">80%</span></h5>
            <div class="progress progress-bar-alt-success progress-sm">
                <div class="progress-bar bg-success progress-animated wow animated animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; visibility: visible; animation-name: animationProgress;">
                </div>
            </div>

            @can('sys_admin_rights')
                <div class="text-right mt-3">
                    <a href="#Edit" class="btn btn-success waves-effect waves-light">
                        Edit
                    </a>
                </div>
            @endcan
        </div>
    </div>
</div>

@endsection

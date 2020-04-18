<!-- Disapproved Record -->
@canany(['sys_admin_rights', 'admin_head_rights'])
<div id="record_reject" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Disapproved</h4>
    <div class="custom-modal-text">
        <div class="col-md-12">

            <form action="{{ route('adminhead.disapproved', $record->id) }}" method="POST" class="form-horizontal" role="form">
                @csrf

                <div class="form-group row">
                    <label for="export">Remarks</label>
                    <textarea id="textarea" class="form-control @error('disapproved_remarks') is-invalid @enderror" name="disapproved_remarks" maxlength="300" rows="4"></textarea>

                    @error('disapproved_remarks')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-0 justify-content-end text-center" id="data-export">
                    <button type="submit" class="btn btn-info waves-effect waves-light">
                        <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endcan


<!-- Upload Resolution -->
@canany(['sys_admin_rights', 'lawyer_rights'])
<div id="upload-resolution" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Upload Resolution</h4>
    <div class="custom-modal-text">
        <div class="col-md-12">

            <form action="{{ route('attorney.resolution', $record->id) }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Remarks</label>
                    <textarea id="textarea" class="form-control @error('remarks') is-invalid @enderror" name="remarks" maxlength="300" rows="4">{{ old('remarks', $record->resolution['remarks'] ?? '') }}</textarea>

                    @error('remarks')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Attachment</label>
                    <input type="file" class="dropify @error('resolution') is-invalid @enderror" name="resolution" data-height="90"

                    @if($record->submission == true)
                    data-default-file="{{ storage_path('app/resolution/') . $record->resolution['attachment'] }}"
                    @endif

                    />

                    @if($errors->has('resolution'))
                        <span class="form-text text-danger" role="alert">
                            <strong>{{ $errors->first('profile') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group mb-0 justify-content-end text-center" id="data-export">
                    <button type="submit" class="btn btn-info waves-effect waves-light">
                        <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endcan


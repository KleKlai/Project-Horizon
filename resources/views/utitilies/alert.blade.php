<script>
    @if(Session::has('swal_success'))
        Swal.fire({
            type:"success",
            title:'{{ Session::get('swal_success') }}',
            confirmButtonClass:"btn btn-confirm mt-2"
        })
    @endif

    @if(Session::has('swal_error'))
        Swal.fire({
            type:"danger",
            text:'{{ Session::get('swal_delete') }}',
            confirmButtonClass:"btn btn-confirm mt-2"
        })
    @endif

    @if(Session::has('swal_change_password'))
        Swal.fire({
            type:"info",
            text:'{{ Session::get('swal_change_password') }}',
            confirmButtonText:"Later",
            footer: '<a href="{{ route("myprofile.index") }}">Change Password</a>'
        })
    @endif

    @if(Session::has('toastr_warn'))
        toastr.warning('{{ Session::get('toastr_warn') }}', '',{positionClass: 'toast-bottom-right', hideDuration: 5000, newestOnTop: true})
    @endif

    @if(Session::has('toastr_danger'))
        toastr.danger('{{ Session::get('toastr_danger') }}', '',{positionClass: 'toast-bottom-right', hideDuration: 5000, newestOnTop: true})
    @endif

    @if(Session::has('toastr_success'))
        toastr.success('{{ Session::get('toastr_success') }}', '',{positionClass: 'toast-bottom-right', hideDuration: 5000, newestOnTop: true})
    @endif
</script>

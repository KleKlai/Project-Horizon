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

    @if(Session::has('toastr_warn'))
        toastr.warning('{{ Session::get('toastr_warn') }}', {newestOnTop: true})
    @endif

    @if(Session::has('toastr_danger'))
        toastr.danger('{{ Session::get('toastr_danger') }}', {newestOnTop: true})
    @endif

    @if(Session::has('toastr_success'))
        toastr.success('{{ Session::get('toastr_success') }}', {newestOnTop: true})
    @endif
</script>

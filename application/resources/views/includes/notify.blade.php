<script src="{{ asset('assets/common/js/sweetalert2.min.js') }}"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>


@if(session()->has('notify'))
@foreach(session('notify') as $msg)
<script>
    Toast.fire({
        icon: '{{ $msg[0] }}',
        title: '{{ __($msg[1]) }}'
    })
</script>
@endforeach
@endif

@if (isset($errors) && $errors->any())
@php
$collection = collect($errors->all());
$errors = $collection->unique();
@endphp

<script>
    "use strict";
    @foreach($errors as $error)

    Toast.fire({
        icon: 'error',
        title: '{{ __($error) }}'
    })

    @endforeach
</script>

@endif
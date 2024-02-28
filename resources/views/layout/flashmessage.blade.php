@if (session()->has('success'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            text: '{{ session('success') }}',
            icon: 'success',
            showConfirmButton: false,
            timer: 1000
        });
    </script>
@elseif(session()->has('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: '{{ session('error') }}',
            icon: 'error',
            showConfirmButton: false,
            timer: 1000
        });
    </script>
@elseif($errors->any())
    <script>
        Swal.fire({
            title: 'Peringatan!',
            text: 'Masukkan Data dengan benar',
            icon: 'warning',
            showConfirmButton: false
        });
    </script>
@endif

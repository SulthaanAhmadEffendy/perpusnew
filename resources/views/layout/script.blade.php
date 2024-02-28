<!-- Bootstrap core JavaScript -->
<script src="{{ asset('template-be/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('template-be/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript -->
<script src="{{ asset('template-be/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Page level plugins -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>


<!-- Custom scripts for all pages -->
<script src="{{ asset('template-be/js/sb-admin-2.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#kategoriForm').submit(function() {
            $('#exampleModal').modal('hide');
        });
    });
</script>

<script>
    function showImage(url) {
        var modalContent = '<div class="modal" tabindex="-1" role="dialog">' +
            '<div class="modal-dialog modal-dialog-centered" role="document">' +
            '<div class="modal-content">' +
            '<div class="modal-body text-center">' + // Center the image
            '<img src="' + url + '" class="img-fluid" style="max-width: 100%; max-height: 80vh; margin: 0 auto;">' +
            // Set max-width and max-height, center the image
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        // Remove any existing modals
        $('.modal').remove();

        // Append the new modal to the body
        $('body').append(modalContent);

        // Show the modal
        $('.modal').modal('show');
    }
</script>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>
<script>
    function deleteConfirmation(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

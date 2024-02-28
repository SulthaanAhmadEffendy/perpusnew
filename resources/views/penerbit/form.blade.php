<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penerbt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('penerbit.store') }}" method="POST" id="kategoriForm">
                    @csrf
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode" id="kode" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kode">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>

                    <button class="btn btn-sm btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

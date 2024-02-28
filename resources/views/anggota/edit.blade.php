@extends('layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Anggota</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('anggota.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode</label>
                                <input type="text" name="kode" id="kode" class="form-control"
                                    value="{{ $data->kode }}">
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ $data->nama }}">
                            </div>

                            <div class="mb-3">
                                <label>Jenis Kelamin</label><br>
                                <label>
                                    <input type="radio" name="jenis_kelamin" value="L"
                                        {{ $data->jenis_kelamin == 'L' ? 'checked' : '' }}>
                                    Laki-Laki
                                </label>

                                <label>
                                    <input type="radio" name="jenis_kelamin" value="P"
                                        {{ $data->jenis_kelamin == 'P' ? 'checked' : '' }}>
                                    Perempuan
                                </label>
                            </div>

                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                    value="{{ $data->tempat_lahir }}">
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                    value="{{ $data->tanggal_lahir }}">
                            </div>

                            <div class="mb-3">
                                <label for="telepon" class="form-label">No Telepon</label>
                                <input type="text" name="telepon" id="telepon" class="form-control"
                                    value="{{ $data->telepon }}">
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                    value="{{ $data->alamat }}">
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Ganti Gambar</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="keep_photo" class="form-label">Simpan Foto yang Ada</label>
                                <input type="checkbox" name="keep_photo" id="keep_photo" value="1">
                            </div>

                            <button class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

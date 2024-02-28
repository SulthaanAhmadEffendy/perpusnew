@extends('layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Buku</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Buku</h4>

                    </div>

                    <div class="card-body">
                        <form action="{{ route('buku.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode</label>
                                <input type="text" name="kode" id="kode" class="form-control"
                                    value="{{ $data->kode }}">
                            </div>

                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control"
                                    value="{{ $data->judul }}">
                            </div>

                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $data->kategori_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="penerbit_id" class="form-label">Penerbit</label>
                                <select name="penerbit_id" id="penerbit_id" class="form-control">
                                    @foreach ($publishers as $publisher)
                                        <option value="{{ $publisher->id }}"
                                            {{ $data->penerbit_id == $publisher->id ? 'selected' : '' }}>
                                            {{ $publisher->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" name="isbn" id="isbn" class="form-control"
                                    value="{{ $data->isbn }}">
                            </div>

                            <div class="mb-3">
                                <label for="pengarang" class="form-label">Pengarang</label>
                                <input type="text" name="pengarang" id="pengarang" class="form-control"
                                    value="{{ $data->pengarang }}">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
                                <input type="text" name="jumlah_halaman" id="jumlah_halaman" class="form-control"
                                    value="{{ $data->jumlah_halaman }}">
                            </div>

                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="text" name="stok" id="stok" class="form-control"
                                    value="{{ $data->stok }}">
                            </div>

                            <div class="mb-3">
                                <label for="sinopsis" class="form-label">Sinopsis</label>
                                <textarea name="sinopsis" id="sinopsis" class="form-control">{{ $data->sinopsis }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="gambar" class="form-label">Ganti Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="keep_photo" class="form-label">Simpan Foto yang Ada</label>
                                <input type="checkbox" name="keep_photo" id="keep_photo" value="1">
                            </div><br>



                            <div class=" justify-content-center">
                                <button class="btn btn-success  focus:cursor-auto">Simpan</button>
                                <a href="{{ route('buku.index') }}" class="btn btn-danger  ">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@extends('layout.master')

@section('title', 'Buku')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mb-4">Buku</h1>
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('buku.create') }}" class="btn btn-success">Tambah Data</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <table class="table-auto datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Penerbit</th>
                                            <th>ISBN</th>
                                            <th>Pengarang</th>
                                            <th>Halaman</th>
                                            <th>Stok</th>
                                            <th>Sinopsis</th>
                                            <th>Gambar</th>
                                            <th style="width: 15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->kode }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->kategori->nama }}</td>
                                                <td>{{ $item->penerbit->nama }}</td>
                                                <td>{{ $item->isbn }}</td>
                                                <td>{{ $item->pengarang }}</td>
                                                <td>{{ $item->jumlah_halaman }}</td>
                                                <td>{{ $item->stok }}</td>
                                                <td>{{ $item->sinopsis }}</td>
                                                <td class="position-relative">
                                                    @if ($item->gambar)
                                                        <button type="button" class="btn btn-info btn-sm"
                                                            style="font-size: 20px;" data-lightbox="buku"
                                                            data-title="{{ $item->judul }}"
                                                            onclick="showImage('{{ asset('storage/' . $item->gambar) }}')">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </button>
                                                    @else
                                                        <span>Gambar Tidak Tersedia</span>
                                                    @endif
                                                </td>

                                                <td class="d-flex">
                                                    <a href="{{ route('buku.edit', $item->id) }}"
                                                        class="btn btn-warning me-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('buku.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="deleteConfirmation({{ $item->id }})">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

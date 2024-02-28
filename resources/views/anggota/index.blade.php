@extends('layout.master')

@section('title', 'Anggota')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mb-4">Anggota</h1>
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('anggota.create') }}" class="btn btn-success">Tambah Data</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Gender</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>No Telepon</th>
                                                <th>Alamat</th>
                                                <th>Foto</th>
                                                <th style="width: 15%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $item->kode }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>
                                                        @if ($item->jenis_kelamin === 'L')
                                                            Pria
                                                        @elseif ($item->jenis_kelamin === 'P')
                                                            Wanita
                                                        @else
                                                            {{ $item->jenis_kelamin }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->tempat_lahir }}</td>
                                                    <td>{{ $item->tanggal_lahir }}</td>
                                                    <td>{{ $item->telepon }}</td>
                                                    <td>{{ $item->alamat }}</td>
                                                    <td class="position-relative">
                                                        @if ($item->foto)
                                                            <button type="button" class="btn btn-info btn-sm"
                                                                style="font-size: 20px;" data-lightbox="buku"
                                                                data-title="{{ $item->id }}"
                                                                onclick="showImage('{{ asset('storage/' . $item->foto) }}')">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        @else
                                                            <span>Gambar Tidak Tersedia</span>
                                                        @endif
                                                    </td>
                                                    <td class="d-flex">
                                                        <a href="{{ route('anggota.edit', $item->id) }}"
                                                            class="btn btn-warning me-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('anggota.destroy', $item->id) }}"
                                                            method="POST">
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
            </div>
        </section>
    </div>


@endsection

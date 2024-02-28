@extends('layout.master')

@section('title', 'Kategori')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kategori</h1>
            </div>

            <div class="section-body">
                <section class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                Tambah Data
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table  datatable">
                            <thead>
                                <tr>
                                    <th style="width: 10%">No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th style="width: 15%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning mr-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('kategori.destroy', $item->id) }}" method="POST">
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
                </section>
            </div>
        </section>
    </div>
    @include('kategori.form')
@endsection

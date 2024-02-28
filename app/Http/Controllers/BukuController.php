<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::all();
        return view('buku.index', compact('data'));
        // @var_dump($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Buku::all();
        $categories = Kategori::all();
        $publishers = Penerbit::all();
        return view('buku.tambah', compact('data', 'publishers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'kode' => 'required',
            'judul' => 'required',
            'kategori_id' => 'required|integer',
            'penerbit_id' => 'required|integer',
            'isbn' => 'required',
            'pengarang' => 'required',
            'jumlah_halaman' => 'required',
            'stok' => 'required',
            'sinopsis' => 'required',
            'gambar' => 'required|max:2000|mimes:jpg',


        ]);
        $validator['gambar'] = $request->file('gambar')->store('img');

        Buku::create($validator);

        return redirect('buku')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = Buku::findOrFail($id);
        $categories = Kategori::all();
        $publishers = Penerbit::all();

        return view('buku.edit', compact('data', 'categories', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'kode' => 'required',
            'judul' => 'required',
            'kategori_id' => 'required|integer',
            'penerbit_id' => 'required|integer',
            'isbn' => 'required',
            'pengarang' => 'required',
            'jumlah_halaman' => 'required',
            'stok' => 'required',
            'sinopsis' => 'required',
            'gambar' => 'max:2000|mimes:jpg',
        ]);

        $data = Buku::findOrFail($id);
        if (!$request->has('keep_photo')) {
            $validator['gambar'] = $request->validate([
                'gambar' => 'required|max:2000|mimes:jpg',
            ])['gambar'];

            // If a new photo is uploaded, store it
            $validator['gambar'] = $request->file('gambar')->store('img');

            // If there is an existing photo, delete it
            if ($data->foto) {
                Storage::delete($data->foto);
            }
        }

        Buku::findOrFail($id)->update($validator);
        return redirect('buku')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Buku::findOrFail($id)->delete();
        return redirect('buku')->with('success', 'Data berhasil dihapus');
    }
}

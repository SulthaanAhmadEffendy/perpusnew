<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Anggota::all();
        return view('anggota.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Anggota::all();
        return view('anggota.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'foto' => 'required|max:2000|mimes:jpg',


        ]);
        $validator['foto'] = $request->file('foto')->store('img');

        Anggota::create($validator);

        return redirect('anggota')->with('success', 'Data berhasil disimpan');
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
        $data = Anggota::findOrFail($id);


        return view('anggota.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);
        $data = Anggota::findOrFail($id);

        // Check if "Keep Photo" checkbox is checked
        if (!$request->has('keep_photo')) {
            $validator['foto'] = $request->validate([
                'foto' => 'required|max:2000|mimes:jpg',
            ])['foto'];

            // If a new photo is uploaded, store it
            $validator['foto'] = $request->file('foto')->store('img');

            // If there is an existing photo, delete it
            if ($data->foto) {
                Storage::delete($data->foto);
            }
        }

        Anggota::findOrFail($id)->update($validator);

        return redirect('anggota')->with('success', 'Data berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Anggota::findOrFail($id)->delete();
        return redirect('anggota')->with('success', 'Data berhasil dihapus');
    }
}

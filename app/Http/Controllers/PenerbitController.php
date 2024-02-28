<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penerbit::all();
        return view('penerbit.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tambahdata = Penerbit::all();
        return view('penerbit.tambah', compact('tambahdata'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'kode' => 'required',
            'nama' => 'required',

        ]);
        //dd($validator);
        Penerbit::create($validator);
        return redirect('penerbit')->with('success', 'Data berhasil diinput');
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
        $data = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'kode' => 'required',
            'nama' => 'required',

        ]);

        Penerbit::findOrFail($id)->update($validator);
        return redirect('penerbit')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penerbit::findOrFail($id)->delete();
        return redirect('penerbit')->with('success', 'Data berhasil dihapus');
    }
}

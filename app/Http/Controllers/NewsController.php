<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsCollection;
use App\Models\Buku;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $news = new NewsCollection(News::paginate(8));
        $book = Buku::with('kategori')->paginate(6);


        return Inertia::render('HomePage', [
            'title' => "sulthaan",
            'description' => "selamat datang broo",
            'news' => $book,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $news = Buku::new();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->category = $request->category;
        $news->author = auth()->user()->email;
        $news->save();
        return redirect()->back()->with('success', 'tambah berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $news)
    {
        //
    }
}

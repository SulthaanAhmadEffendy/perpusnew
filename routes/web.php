<?php

use App\Models\User;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

Route::get('/', [NewsController::class, 'index']);
Route::get('/', [NewsController::class, 'index']);
Route::post('/news', [NewsController::class, 'store']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Penanganan admin dan user
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->isAdmin()) {
            return view('layout.dashboard');
        } else {
            return Inertia::render('Dashboard');
        }
    })->name('dashboard')->middleware('auth');

    Route::resource('/buku', BukuController::class);
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/penerbit', PenerbitController::class);
    Route::resource('/anggota', AnggotaController::class);
});

require __DIR__ . '/auth.php';

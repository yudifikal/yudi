<?php

use App\Http\Controllers\AdminKonsultasiController;
use App\Http\Controllers\AdminPesananController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JasaKontruksiController;
use App\Http\Controllers\JasaTukangController;
use App\Http\Controllers\JkController;
use App\Http\Controllers\JkKonsumen;
use App\Http\Controllers\JtController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\KontruksiController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MkController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::post('/', [PengelolaController::class, 'login']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/daftar', [PengelolaController::class, 'daftar']);
Route::get('/tambahkontruksi', [PengelolaController::class, 'tambahkontruksi']);
Route::get('/tambahtukang', [PengelolaController::class, 'tambahtukang']);
Route::get('/tambahmaterial', [PengelolaController::class, 'tambahmaterial']);
Route::get('/jasakontruksi', [PengelolaController::class, 'jasakontruksi']);
Route::get('/jasatukang', [PengelolaController::class, 'jasatukang']);
Route::get('/material', [PengelolaController::class, 'material']);
Route::get('/konsumen', [PengelolaController::class, 'konsumen']);
Route::get('/dashboard', [PengelolaController::class, 'dashboard']);
Route::get('/dashboardkonsumen', [KonsumenController::class, 'dashboardkonsumen']);
Route::post('/dashboardkonsumen', [KonsumenController::class, 'dashboardkonsumen']);
Route::get('/jasakontruksikonsumen', [KonsumenController::class, 'jasakontruksikonsumen']);
Route::get('/jasatukangkonsumen', [KonsumenController::class, 'jasatukangkonsumen']);

Route::get('/pesanankonsumen', [KonsumenController::class, 'pesanankonsumen']);
Route::post('/daftar', [PengelolaController::class, 'daftar']);
Route::post('/tambahkontruksi', [PengelolaController::class, 'tambahkontruksi']);
Route::post('/tambahtukang', [PengelolaController::class, 'tambahtukang']);
Route::post('/tambahmaterial', [PengelolaController::class, 'tambahmaterial']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['role:pengelola']], function () {
    Route::get('/dashboard-pengelola', function () {
        // Pengelola dashboard
    });
});

Route::group(['middleware' => ['role:konsumen']], function () {
    Route::get('/dashboard-konsumen', function () {
        // Konsumen dashboard
    });
});


Route::view('/dashboard', 'dashboard');
Route::get('/jasakontruksi', [PengelolaController::class, 'readData']);
Route::delete('/jasakontruksi/{id_kontruksi}', [PengelolaController::class, 'destroy'])->name('delete');
Route::resource('jasakontruksi', JasaKontruksiController::class);
Route::resource('jasatukang', JasaTukangController::class);
Route::resource('material', MaterialController::class);
Route::get('/jasakontruksikonsumen', [JkController::class, 'index'])->name('jasakontruksikonsumen.index');
Route::get('/jasatukangkonsumen', [JtController::class, 'index'])->name('jasatukangkonsumen.index');
Route::get('/materialkonsumen', [MkController::class, 'index'])->name('materialkonsumen.index');
Route::get('konsumen', [KonsumenController::class, 'index'])->name('konsumen.index');
Route::get('konsumen/{email}/edit', [KonsumenController::class, 'edit'])->name('konsumen.edit');
Route::put('konsumen/{email}', [KonsumenController::class, 'update'])->name('konsumen.update');
Route::delete('konsumen/{email}', [KonsumenController::class, 'destroy'])->name('konsumen.destroy');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/konsultasi/jadwal/{id}', [KonsultasiController::class, 'create'])->name('konsultasi.create');
Route::post('/konsultasi/jadwal', [KonsultasiController::class, 'store'])->name('konsultasi.store');
Route::get('/konsultasi/jadwal', [KonsultasiController::class, 'index'])->name('konsultasi.index');

Route::get('dashboard', [AdminKonsultasiController::class, 'dashboard'])->name('dashboard');
Route::post('konsultasi/approve/{id}', [AdminKonsultasiController::class, 'approve'])->name('admin.konsultasi.approve');
Route::post('konsultasi/reject/{id}', [AdminKonsultasiController::class, 'reject'])->name('admin.konsultasi.reject');

// routes/web.php
Route::get('/formPesananKontruksi/{id}', [PesananController::class, 'formPesananKontruksi'])->name('formPesananKontruksi');
Route::post('/buatPesananKontruksi', [PesananController::class, 'buatPesananKontruksi'])->name('buatPesananKontruksi');
Route::get('/pesanankonsumen', [PesananController::class, 'pesanankonsumen'])->name('pesanankonsumen');

Route::get('/formPesananTukang/{id}', [PesananController::class, 'formPesananTukang'])->name('formPesananTukang');
Route::post('/buatPesananTukang', [PesananController::class, 'buatPesananTukang'])->name('buatPesananTukang');

Route::get('/formPesananMaterial/{id}', [PesananController::class, 'formPesananMaterial'])->name('formPesananMaterial');
Route::post('/buatPesananMaterial', [PesananController::class, 'buatPesananMaterial'])->name('buatPesananMaterial');

Route::get('/pesanan', [AdminPesananController::class, 'index'])->name('pesanan');

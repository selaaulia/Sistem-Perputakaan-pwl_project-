<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PeminjamanAnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('password', [PasswordController::class, 'edit'])->name('user.password.edit');

    Route::patch('password', [PasswordController::class, 'update'])->name('user.password.update');

    Route::resource('/profile', UserController::class);

    Route::middleware(['admin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'home']);

            //CRUD Anggota
            Route::get('/anggota/cari/', [AnggotaController::class, 'search']);
            Route::resource('/anggota', AnggotaController::class);

            //CRUD Buku
            Route::get('/buku/cari/', [BukuController::class, 'search']);
            Route::resource('/buku', BukuController::class);

            //CRUD Petugas
            Route::get('/petugas/cari/', [PetugasController::class, 'search']);
            Route::resource('/petugas', PetugasController::class);

            //CRUD Admin
            Route::get('/admin/cari/', [AdminController::class, 'search']);
            Route::resource('/admin', AdminController::class);

            //CRUD Peminjaman
            Route::resource('/peminjaman', PeminjamanController::class);

            // Laporan
            Route::get('/laporan/cetak_pdf', [LaporanController::class, 'cetak_pdf'])->name('admin.cetak_pdf');
            Route::resource('/laporan', LaporanController::class);
        });
    });

    Route::middleware(['petugas'])->group(function () {
        Route::prefix('petugas')->group(function () {
            Route::get('/', [PetugasController::class, 'home']);
            //CRUD Anggota
            Route::get('/anggota/cari/', [AnggotaController::class, 'search']);
            Route::resource('/anggota', AnggotaController::class);

            //CRUD Buku
            Route::get('/buku/cari/', [BukuController::class, 'search']);
            Route::resource('/buku', BukuController::class);

            //peminjaman petugas
            Route::put('/transaksi/konfirmasi/{id}', [TransaksiController::class, 'konfirmasi']);
            Route::get('/transaksi/konfirmasi', [TransaksiController::class, 'konfirmasiPeminjaman']);
            Route::put('/transaksi/perpanjang/{id}', [TransaksiController::class, 'perpanjang']);
            Route::resource('/transaksi', TransaksiController::class);

            // Laporan
            Route::get('/laporan/cetak_pdf', [LaporanController::class, 'cetak_pdf'])->name('petugas.cetak_pdf');
            Route::resource('/laporan', LaporanController::class);
        });
    });

    Route::middleware(['anggota'])->group(function () {
        Route::prefix('anggota')->group(function () {
            Route::get('/', [AnggotaController::class, 'home']);

            //Peminjaman 
            Route::get('/pinjam/delete/{id}', [PeminjamanAnggotaController::class, 'delete']);
            Route::get('/pinjam/perpanjang/{id}', [PeminjamanAnggotaController::class, 'modalPerpanjang']);
            Route::put('/perpanjang/{id}', [PeminjamanAnggotaController::class, 'perpanjang']);
            Route::get('/modal/pinjam/{id}', [PeminjamanAnggotaController::class, 'pinjam']);
            Route::post('/pinjam/{id}', [PeminjamanAnggotaController::class, 'peminjaman']);
            Route::resource('/pinjam', PeminjamanAnggotaController::class);

            //DATA Buku
            Route::get('/buku', [AnggotaController::class, 'buku']);
            Route::get('/buku/{id}', [AnggotaController::class, 'lihatbuku']);
        });
    });

    Route::get('/logout', function () {
        Auth::logout();
        redirect('/');
    });
});

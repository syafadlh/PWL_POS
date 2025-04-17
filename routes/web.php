<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LevelController; 
use App\Http\Controllers\KategoriController; 
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController; 
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController; 

use App\Http\Controllers\AuthController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/level', [LevelController::class, 'index']);
 Route::get('/kategori', [KategoriController::class, 'index']);
 Route::get('/user', [UserController::class, 'index']);
 
 Route::get('/user/tambah', [UserController::class, 'tambah']);
 Route::post('user/tambah_simpan', [UserController::class, 'tambah_simpan']);
 Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
 Route::put('user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
 Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

Route::pattern('id', '[0-9]+');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::POST('logout', [AuthController::class, 'logout'])->name('logout'); //ubah methodnya jadi POST

Route::middleware(['auth'])->group(function () { //artinya semua route di dalam group ini harus login
    
    Route::get('/', [WelcomeController::class, 'index']);

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']); // Halaman awal user
        Route::post('/list', [UserController::class, 'list']); // Data JSON untuk datatables
        Route::get('/create', [UserController::class, 'create']); // Form tambah user
        Route::post('/', [UserController::class, 'store']); // Simpan user baru
        Route::get('/create_ajax', [UserController::class, 'create_ajax']); // Form tambah user Ajax
        Route::post('/ajax', [UserController::class, 'store_ajax']); // Simpan user Ajax
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // Form edit user Ajax
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // Updat   e user Ajax
        Route::get('/{id}', [UserController::class, 'show']); // Detail user
        Route::get('/{id}/edit', [UserController::class, 'edit']); // Form edit user
        Route::put('/{id}', [UserController::class, 'update']); // Update user
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Confirm delete Ajax
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Hapus user Ajax
        Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']); // Menampilkan detail user Ajax
        Route::delete('/{id}', [UserController::class, 'destroy']); // Hapus user
    });

    Route::group(['prefix' => 'level'], function () {
        Route::middleware(['authorize:ADM'])->group(function () {
            Route::get('/', [LevelController::class, 'index']);
            Route::post("/list", [LevelController::class, 'list']);
            Route::get('/create', [LevelController::class, 'create']);
            Route::post('/', [LevelController::class, 'store']);
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
            Route::post('/ajax', [LevelController::class, 'store_ajax']);
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
            Route::get('/{id}', [LevelController::class, 'show']);
            Route::get('/{id}/edit', [LevelController::class, 'edit']);
            Route::put('/{id}', [LevelController::class, 'update']);
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
            Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
            Route::delete('/{id}', [LevelController::class, 'destroy']);
        });
    });

    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/', [KategoriController::class, 'index']);
        Route::post("/list", [KategoriController::class, 'list']);
        Route::get('/create', [KategoriController::class, 'create']);
        Route::post('/', [KategoriController::class, 'store']);
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
        Route::post('/ajax', [KategoriController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
        Route::get('/{id}', [KategoriController::class, 'show']);
        Route::get('/{id}/edit', [KategoriController::class, 'edit']);
        Route::put('/{id}', [KategoriController::class, 'update']);
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
        Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
        Route::delete('/{id}', [KategoriController::class, 'destroy']);
    });

    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/', [SupplierController::class, 'index']);
        Route::post("/list", [SupplierController::class, 'list']);
        Route::get('/create', [SupplierController::class, 'create']);
        Route::post('/', [SupplierController::class, 'store']);
        Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
        Route::post('/ajax', [SupplierController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
        Route::get('/{id}', [SupplierController::class, 'show']);
        Route::get('/{id}/edit', [SupplierController::class, 'edit']);
        Route::put('/{id}', [SupplierController::class, 'update']);
        Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
        Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
        Route::delete('/{id}', [SupplierController::class, 'destroy']);
    });

    Route::group(['prefix' => 'barang'], function () {
        Route::get('/', [BarangController::class, 'index']);
        Route::post("/list", [BarangController::class, 'list']);
        Route::get('/create', [BarangController::class, 'create']);
        Route::post('/', [BarangController::class, 'store']);
        Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
        Route::post('/ajax', [BarangController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
        Route::get('/{id}', [BarangController::class, 'show']);
        Route::get('/{id}/edit', [BarangController::class, 'edit']);
        Route::put('/{id}', [BarangController::class, 'update']);
        Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
        Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']);
        Route::delete('/{id}', [BarangController::class, 'destroy']);
    });
});
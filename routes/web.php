<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\PembayaranController;

Route::group(['middleware' => ['auth', 'auth.admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/admin/room-type', [RoomTypeController::class, 'index'])->name('room-type');
    Route::post('/admin/room-type', [RoomTypeController::class, 'store']);
    Route::get('/admin/room-type/{id}', [RoomTypeController::class, 'edit']);
    Route::post('/admin/room-type/update', [RoomTypeController::class, 'update'])->name('room-type-update');
    Route::get('/admin/room-type/delete/{id}', [RoomTypeController::class, 'delete']);
    
    Route::get('/admin/rooms', [RoomController::class, 'index'])->name('room');
    Route::post('/admin/rooms', [RoomController::class, 'store']);
    Route::get('/admin/rooms/{id}', [RoomController::class, 'edit']);
    Route::post('/admin/rooms/update', [RoomController::class, 'update'])->name('room-update');
    Route::get('/admin/rooms/delete/{id}', [RoomController::class, 'delete']);
    
    Route::get('/admin/bank', [BankController::class, 'index'])->name('bank');
    Route::post('/admin/bank', [BankController::class, 'store']);
    Route::get('/admin/bank/{id}', [BankController::class, 'edit']);
    Route::post('/admin/bank/update', [BankController::class, 'update'])->name('bank-update');
    Route::get('/admin/bank/delete/{id}', [BankController::class, 'delete']);

    Route::get('/admin/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::post('/admin/pembayaran/konfirmasi', [PembayaranController::class, 'konfir'])->name('konfir');
    Route::post('/admin/pembayaran/batalkan', [PembayaranController::class, 'batal'])->name('batal');
});


Route::group(['middleware' => ['auth', 'auth.user']], function () {
    Route::get('/booking-now/{id}', [UserController::class, 'booking']);
    Route::get('/transfer/{harga}', [UserController::class, 'transfer'])->name('transfer');
    Route::get('/konfirmasi', [UserController::class, 'konfirmasiPembayaran'])->name('konfirmasi');
    Route::post('/konfirmasi', [UserController::class, 'konfirmasi']);
    Route::get('/status-pembayaran', [UserController::class, 'status'])->name('status-pembayaran');
});
Route::get('/type/{id}', [UserController::class, 'type']);
Route::get('/', [UserController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

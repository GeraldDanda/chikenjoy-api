<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DetailTransaksiController;

Route::get('/menu', [MenuController::class, 'index']);
Route::post('/tambah-menu', [MenuController::class, 'store']);
Route::put('/edit-menu/{id}', [MenuController::class, 'update']);
Route::delete('/hapus-menu/{id}', [MenuController::class, 'destroy']);
Route::post('/tambah-detail-transaksi', [DetailTransaksiController::class, 'store']);
Route::get('/nota-transaksi/{id}', [DetailTransaksiController::class, 'generatePdf']);

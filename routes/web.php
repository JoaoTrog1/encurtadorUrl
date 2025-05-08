<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LockController;
use App\Http\Controllers\PainelController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/painel', [PainelController::class, 'painel'])->name('painel');
Route::post('/painel/login', [PainelController::class, 'login'])->name('painel.login');
Route::get('/painel/logout', [PainelController::class, 'logout'])->name('painel.logout');

Route::get('/painel/dashboard', [LinkController::class,'index'])->name('links.index');
Route::get('/painel/links/create', [LinkController::class,'create'])->name('links.create');
Route::post('/painel/links/create', [LinkController::class, 'store'])->name('links.store');
Route::get('/painel/links/{link}/edit', [LinkController::class,'edit'])->name('links.edit');
Route::put('/painel/links/{link}/edit', [LinkController::class, 'update'])->name('links.update');
Route::get('/painel/links/{link}/delete', [LinkController::class,'destroy'])->name('links.destroy');

Route::get('/painel/locks/{lock}/delete', [LockController::class, 'destroy'])->name('locks.destroy');

Route::get('/encurtador/{link}', [LinkController::class, 'show'])->name('links.show');
Route::get('/{link}', [LinkController::class, 'show'])->name('links.show');
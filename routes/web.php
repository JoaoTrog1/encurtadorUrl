<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\BloqueioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PainelController;

Route::get('/', function () {
    return view('welcome');
});




//Route::get('/encurtador/{link}', [LinkController::class, 'show'])->name('links.show');

// Route::get('/users/create', [UserController::class,'create'])->name('users.create');
// Route::post('/users',[UserController::class, 'store'])->name('users.store');

Route::get('/painel', [PainelController::class, 'painel'])->name('painel');
Route::post('/painel/login', [PainelController::class, 'login'])->name('painel.login');
Route::get('/painel/logout', [PainelController::class, 'logout'])->name('painel.logout');

Route::get('/painel/dashboard', [LinkController::class,'index'])->name('links.index');
Route::get('/painel/links/create', [LinkController::class,'create'])->name('links.create');
Route::post('/painel/links/create', [LinkController::class, 'store'])->name('links.store');

Route::get('/{link}', [LinkController::class, 'show'])->name('links.show');
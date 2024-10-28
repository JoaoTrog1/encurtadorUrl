<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\BloqueioController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/encurtador/create', function () {
    return view('teste');
});

Route::post('/encurtador', [LinkController::class, 'store']);
Route::get('/encurtador/{identifier}', [LinkController::class, 'show']);

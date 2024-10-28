<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

Route::get('/', function () {
    return view('teste');
});

Route::post('/', [LinkController::class, 'store']);
Route::get('/{identifier}', [LinkController::class, 'show']);

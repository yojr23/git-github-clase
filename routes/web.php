<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/producto-a', function () {
    return view('productoA'); // tu página de detalle
})->name('producto.a');
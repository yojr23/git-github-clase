<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/producto-a', function () {
    return view('productoA'); // tu página de detalle
})->name('producto.a');



Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');



Route::get('/productos', function () {
    return view('productos_general');
})->name('productos.general');

Route::get('/checkout', function () {
    $cart = session()->get('cart', []);
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return view('checkout', compact('cart', 'total'));
})->name('checkout');
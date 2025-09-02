<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Mostrar el carrito
     */
    public function index()
    {
        $cart = session()->get('cart', []); // si no existe carrito, devuelve []
        return view('cart', compact('cart'));
    }

    /**
     * Agregar producto al carrito
     */
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;
        $name = $request->name;
        $price = $request->price;
        $quantity = $request->quantity ?? 1;

        // Validar que el id no sea nulo o vacío
        if (empty($id)) {
            return redirect()->route('cart.index')->with('error', 'No se pudo agregar el producto: ID inválido');
        }

        // Si ya existe el producto, sumamos cantidad
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "name" => $name,
                "price" => $price,
                "quantity" => $quantity
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito');
    }

    /**
     * Actualizar cantidad de un producto
     */
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Carrito actualizado');
    }

    /**
     * Eliminar producto del carrito
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }

    /**
     * Vaciar el carrito completo
     */
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Carrito vacío');
    }
}

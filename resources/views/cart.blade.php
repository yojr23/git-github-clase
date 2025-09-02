{{-- resources/views/cart.blade.php --}}
@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-8 text-orange-600">🛒 Tu Carrito</h1>

    @if(isset($cart) && count($cart) > 0)
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-yellow-100 via-pink-100 to-green-100 text-gray-700 uppercase text-sm">
                        <th class="p-4">Producto</th>
                        <th class="p-4">Precio</th>
                        <th class="p-4">Cantidad</th>
                        <th class="p-4">Subtotal</th>
                        <th class="p-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; $hayProductos = false; @endphp
                    @foreach($cart as $id => $item)
                        @if(!empty($id) && !empty($item['name']) && $item['price'] > 0)
                            @php
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal;
                                $hayProductos = true;
                            @endphp
                            <tr class="border-b cart-row">
                                <td class="p-4 font-medium text-gray-900">{{ $item['name'] }}</td>
                                <td class="p-4">${{ number_format($item['price'], 2) }}</td>
                                <td class="p-4">
                                    <input type="number"
                                           value="{{ $item['quantity'] }}"
                                           min="1"
                                           data-id="{{ $id }}"
                                           class="update-cart w-16 border rounded p-1 text-center">
                                </td>
                                <td class="p-4 font-semibold text-gray-800">
                                    $<span id="subtotal-{{ $id }}">{{ number_format($subtotal, 2) }}</span>
                                </td>
                                <td class="p-4">
                                    <form action="{{ route('cart.remove', ['id' => $id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cart-action-btn cart-remove-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Eliminar producto
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if(!$hayProductos)
                        <tr>
                            <td colspan="5" class="text-center text-gray-500 py-8">Tu carrito está vacío.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center mt-6 gap-4">
            <h3 class="text-xl font-bold">
                Total: $<span id="cart-total">{{ number_format($total, 2) }}</span>
            </h3>
            <div class="flex gap-4">
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="cart-action-btn cart-clear-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Vaciar Carrito
                    </button>
                </form>
                <a href="{{ route('checkout') }}" class="cart-action-btn cart-pay-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Proceder al Pago
                </a>
            </div>
        </div>
    @else
        <p class="text-gray-500 mt-6">Tu carrito está vacío.</p>
    @endif
</div>

<style>
    .cart-action-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: bold;
        font-size: 1.1em;
        padding: 14px 32px;
        border-radius: 32px;
        border: none;
        outline: none;
        box-shadow: 0 4px 16px rgba(0,0,0,0.10);
        transition: all 0.2s;
        cursor: pointer;
        margin: 0 4px;
    }
    .cart-clear-btn {
        background: linear-gradient(90deg, #ff4e50 0%, #f9d423 100%);
        color: #fff;
        border: 2px solid #ff4e50;
    }
    .cart-clear-btn svg {
        color: #fff;
    }
    .cart-clear-btn:hover {
        background: #ff4e50;
        color: #fff;
        box-shadow: 0 6px 20px rgba(255,78,80,0.18);
        transform: scale(1.04);
    }
    .cart-pay-btn {
        background: linear-gradient(90deg, #43e97b 0%, #38f9d7 100%);
        color: #fff;
        border: 2px solid #43e97b;
    }
    .cart-pay-btn svg {
        color: #fff;
    }
    .cart-pay-btn:hover {
        background: #43e97b;
        color: #fff;
        box-shadow: 0 6px 20px rgba(67,233,123,0.18);
        transform: scale(1.04);
    }
    .cart-remove-btn {
        background: linear-gradient(90deg, #ff4e50 0%, #f9d423 100%);
        color: #fff;
        border: 2px solid #ff4e50;
        padding: 10px 24px;
        font-size: 1em;
    }
    .cart-remove-btn svg {
        color: #fff;
    }
    .cart-remove-btn:hover {
        background: #ff4e50;
        color: #fff;
        box-shadow: 0 6px 20px rgba(255,78,80,0.18);
        transform: scale(1.04);
    }
    .cart-row {
        background: linear-gradient(90deg, #fffbe6 0%, #ffe6f7 50%, #e6fff7 100%);
        border-radius: 18px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
</style>
{{-- Script para actualizar cantidades en vivo --}}
<script>
document.querySelectorAll('.update-cart').forEach(input => {
    input.addEventListener('change', function(e) {
        e.preventDefault();
        let id = this.dataset.id;
        let quantity = this.value;

        fetch(`/cart/update/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ quantity: quantity })
        })
        .then(res => res.json())
        .then(data => {
            // Actualizar subtotal del producto
            if(data.cart && data.cart[id]) {
                document.querySelector(`#subtotal-${id}`).innerText =
                    (data.cart[id].price * data.cart[id].quantity).toFixed(2);
            }
            // Actualizar total general
            if(data.total !== undefined) {
                document.querySelector('#cart-total').innerText =
                    data.total.toFixed(2);
            }
        })
        .catch(err => console.error(err));
    });
});
</script>
@endsection

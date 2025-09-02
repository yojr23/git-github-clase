{{-- resources/views/cart.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">🛒 Tu Carrito</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm">
                        <th class="p-4">Producto</th>
                        <th class="p-4">Precio</th>
                        <th class="p-4">Cantidad</th>
                        <th class="p-4">Subtotal</th>
                        <th class="p-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $item)
                        @php $subtotal = $item['price'] * $item['quantity']; @endphp
                        @php $total += $subtotal; @endphp
                        <tr class="border-b">
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
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-between items-center mt-6">
            <h3 class="text-xl font-bold">
                Total: $<span id="cart-total">{{ number_format($total, 2) }}</span>
            </h3>
            <a href="{{ route('checkout') }}" 
               class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Proceder al Pago
            </a>
        </div>
    @else
        <p class="text-gray-500">Tu carrito está vacío.</p>
    @endif
</div>

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
            document.querySelector(`#subtotal-${id}`).innerText =
                (data.cart[id].price * data.cart[id].quantity).toFixed(2);

            // Actualizar total general
            document.querySelector('#cart-total').innerText =
                data.total.toFixed(2);
        });
    });
});
</script>
@endsection

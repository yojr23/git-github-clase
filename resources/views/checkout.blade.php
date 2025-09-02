@extends('layouts.app')

@section('title', 'Resumen de Pedido')

@section('content')
<div class="max-w-4xl mx-auto p-8">
    <h1 class="text-3xl font-bold mb-8 text-orange-600">Resumen de tu Pedido</h1>

    @if(isset($cart) && count($cart) > 0)
        <table class="w-full text-left border-collapse mb-8 bg-white shadow rounded-lg">
            <thead>
                <tr class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <th class="p-4">Producto</th>
                    <th class="p-4">Precio</th>
                    <th class="p-4">Cantidad</th>
                    <th class="p-4">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr class="border-b">
                        <td class="p-4 font-medium text-gray-900">{{ $item['name'] }}</td>
                        <td class="p-4">${{ number_format($item['price'], 2) }}</td>
                        <td class="p-4">{{ $item['quantity'] }}</td>
                        <td class="p-4 font-semibold text-gray-800">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right mb-8">
            <span class="text-xl font-bold">Total: ${{ number_format($total, 2) }}</span>
        </div>
        <div class="flex flex-col md:flex-row gap-4 justify-end">
            <a href="{{ route('cart.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 transition">Volver al carrito</a>
            <button class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition" disabled>Confirmar Pedido (demo)</button>
        </div>
    @else
        <p class="text-gray-500">No hay productos en el carrito.</p>
    @endif
</div>
@endsection

<!-- resources/views/productos_general.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-20">
    <h1 class="text-4xl font-bold text-center text-orange-600 mb-12">Nuestros Productos</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Producto -->
        @php
            $productos = [
                ['id'=>1, 'icon'=>'📊', 'nombre'=>'Dashboard Interactivo', 'desc'=>'Visualiza métricas clave de tu negocio en tiempo real con un panel moderno y fácil de usar.', 'precio'=>120],
                ['id'=>2, 'icon'=>'🤖', 'nombre'=>'Análisis con IA', 'desc'=>'Algoritmos inteligentes que predicen tendencias y ayudan a tomar mejores decisiones.', 'precio'=>200],
                ['id'=>3, 'icon'=>'📈', 'nombre'=>'Reportes Automáticos', 'desc'=>'Genera reportes detallados en segundos sin necesidad de procesos manuales.', 'precio'=>90],
                ['id'=>4, 'icon'=>'📂', 'nombre'=>'Limpieza de Datos', 'desc'=>'Elimina duplicados, errores y organiza tus datos para análisis efectivos.', 'precio'=>70],
                ['id'=>5, 'icon'=>'🌐', 'nombre'=>'Integración API', 'desc'=>'Conecta tus sistemas y bases de datos de manera rápida y segura.', 'precio'=>150],
                ['id'=>6, 'icon'=>'🔐', 'nombre'=>'Seguridad de Datos', 'desc'=>'Protege la información de tu negocio con encriptación avanzada.', 'precio'=>180],
            ];
        @endphp

        @foreach($productos as $producto)
        <div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col hover:scale-105 transition-transform duration-300">
            <h2 class="text-2xl font-bold mb-2">{{ $producto['icon'] }} {{ $producto['nombre'] }}</h2>
            <p class="text-gray-600 flex-grow">{{ $producto['desc'] }}</p>
            <p class="text-lg font-semibold mt-4 text-orange-600">${{ $producto['precio'] }}</p>
            <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="id" value="{{ $producto['id'] }}">
                <input type="hidden" name="name" value="{{ $producto['nombre'] }}">
                <input type="hidden" name="price" value="{{ $producto['precio'] }}">
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-orange-500 to-red-500 text-white font-semibold px-4 py-3 rounded-xl shadow-md hover:from-orange-600 hover:to-red-600 transition-all duration-300">
                    🛒 Agregar al carrito
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection


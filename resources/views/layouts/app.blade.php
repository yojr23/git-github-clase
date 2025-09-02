<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Landing Page')</title>
    @vite('resources/css/app.css') {{-- TailwindCSS --}}
</head>
<body class="bg-gray-50 text-gray-900 font-sans">

    {{-- Header global --}}
    <header class="flex justify-between items-center px-8 py-6 bg-white shadow-md fixed top-0 w-full z-50">
    <div class="text-2xl font-bold text-orange-600">🚀 MiLogo</div>
    
    <nav class="hidden md:flex space-x-8 font-semibold">
        <a href="{{ url('/') }}" class="hover:text-orange-500">Inicio</a>
        <a href="{{ route('productos.general') }}" class="hover:text-orange-500">Productos</a>
        <a href="#servicios" class="hover:text-orange-500">Servicios</a>
        <a href="#testimonios" class="hover:text-orange-500">Testimonios</a>
        <a href="#contacto" class="hover:text-orange-500">Contacto</a>
        {{-- Enlace al carrito --}}
        <a href="{{ route('cart.index') }}" class="relative hover:text-orange-500">
            🛒 Carrito
            @if(session('cart') && count(session('cart')) > 0)
                <span class="absolute -top-3 -right-4 bg-orange-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">
                    {{ count(session('cart')) }}
                </span>
            @endif
        </a>
    </nav>
    
    <button class="md:hidden text-gray-600">☰</button>
</header>


    {{-- Contenido dinámico --}}
    <main class="pt-24">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer id="contacto" class="bg-gray-900 text-gray-300 py-12 mt-20">
        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-12 px-10">
            <div>
                <h4 class="text-lg font-semibold mb-4 text-white">🚀 MiLogo</h4>
                <p>Impulsando innovación con soluciones digitales modernas.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4 text-white">Enlaces</h4>
                <ul>
                    <li><a href="#productos" class="hover:text-orange-400">Productos</a></li>
                    <li><a href="#servicios" class="hover:text-orange-400">Servicios</a></li>
                    <li><a href="#contacto" class="hover:text-orange-400">Contacto</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4 text-white">Síguenos</h4>
                <div class="flex space-x-6 text-xl">
                    <a href="#" class="hover:text-orange-400">🐦</a>
                    <a href="#" class="hover:text-orange-400">📘</a>
                    <a href="#" class="hover:text-orange-400">📸</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

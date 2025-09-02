@extends('layouts.app')

@section('title', 'Landing Page - Innovación Digital')

@section('content')

    {{-- Hero Section --}}
    <section id="hero" class="flex flex-col md:flex-row items-center justify-between px-10 py-24 bg-gradient-to-r from-orange-500 to-teal-500 text-white">
        <div class="max-w-lg">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Innovación que impulsa tu negocio</h1>
            <p class="mb-6 text-lg">Creamos soluciones digitales modernas para hacer crecer tus ideas y mejorar tu productividad.</p>
            <a href="#productos" class="px-8 py-4 bg-yellow-400 text-black font-semibold rounded-xl shadow-md hover:bg-yellow-500 transition">Explorar</a>
        </div>
        <div class="mt-10 md:mt-0">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxIQkFk1q64zAH5SFumL68OXyoVBUUoC1Ncg&s" alt="Ilustración" class="w-96">
        </div>
    </section>

    {{-- Productos --}}
    <section id="productos" class="py-20 px-10 bg-gray-100">
        <h2 class="text-3xl font-bold text-center mb-12">Nuestros Productos</h2>
        <div class="grid md:grid-cols-3 gap-10">
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center hover:scale-105 transition">
                <svg class="mx-auto w-16 h-16 text-orange-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <h3 class="mt-6 text-xl font-semibold">Producto A</h3>
                <p class="mt-3 text-gray-600">Solución innovadora para transformar tu negocio.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center hover:scale-105 transition">
                <svg class="mx-auto w-16 h-16 text-teal-500" fill="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                </svg>
                <h3 class="mt-6 text-xl font-semibold">Producto B</h3>
                <p class="mt-3 text-gray-600">Tecnología moderna para mejorar tu productividad.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center hover:scale-105 transition">
                <svg class="mx-auto w-16 h-16 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                    <rect width="20" height="20" x="2" y="2" rx="5"></rect>
                </svg>
                <h3 class="mt-6 text-xl font-semibold">Producto C</h3>
                <p class="mt-3 text-gray-600">Diseñado para empresas que buscan destacar.</p>
            </div>
        </div>
    </section>

    {{-- Servicios --}}
    <section id="servicios" class="py-20 px-10">
        <h2 class="text-3xl font-bold text-center mb-12">Nuestros Servicios</h2>
        <div class="grid md:grid-cols-2 gap-12">
            <div class="flex items-start space-x-6">
                <svg class="w-12 h-12 text-orange-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l4 4-4 4-4-4 4-4zM2 12l4-4 4 4-4 4-4-4zm18 0l-4-4-4 4 4 4 4-4zm-10 6l4 4-4 4-4-4 4-4z"/>
                </svg>
                <div>
                    <h3 class="text-xl font-semibold">Consultoría Digital</h3>
                    <p class="text-gray-600">Te acompañamos en el camino hacia la transformación digital.</p>
                </div>
            </div>
            <div class="flex items-start space-x-6">
                <svg class="w-12 h-12 text-teal-500" fill="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                </svg>
                <div>
                    <h3 class="text-xl font-semibold">Desarrollo a Medida</h3>
                    <p class="text-gray-600">Creamos software adaptado a tus necesidades específicas.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonios --}}
    <section id="testimonios" class="py-20 px-10 bg-gray-100">
        <h2 class="text-3xl font-bold text-center mb-12">Lo que dicen nuestros clientes</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md">
                <p class="text-gray-600 italic">“Un equipo increíble, logramos duplicar nuestras ventas.”</p>
                <h4 class="mt-4 font-bold text-orange-600">Carlos M.</h4>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md">
                <p class="text-gray-600 italic">“La mejor experiencia trabajando en un proyecto digital.”</p>
                <h4 class="mt-4 font-bold text-teal-600">Ana G.</h4>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md">
                <p class="text-gray-600 italic">“Innovación y resultados que superaron nuestras expectativas.”</p>
                <h4 class="mt-4 font-bold text-yellow-600">Luis R.</h4>
            </div>
        </div>
    </section>

@endsection

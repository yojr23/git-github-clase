{{-- resources/views/productos/analisis-datos.blade.php --}}
@extends('layouts.app') {{-- Usa tu layout principal --}}

@section('title', 'Análisis de Datos para tu Negocio')

@section('content')
    <section class="bg-gradient-to-br from-orange-100 via-white to-orange-50 min-h-screen flex items-center justify-center px-6">
        <div class="max-w-6xl w-full grid md:grid-cols-2 gap-12 items-center">
            
            {{-- Texto descriptivo --}}
            <div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                    Análisis de Datos para tu Negocio
                </h1>
                <p class="text-lg md:text-xl text-gray-700 mb-8">
                    Convierte tus datos en <span class="text-orange-600 font-semibold">decisiones inteligentes</span>.  
                    Identifica patrones, optimiza procesos y haz crecer tus ingresos con nuestras soluciones personalizadas.
                </p>

                {{-- Botones de acción --}}
                <div class="flex flex-wrap gap-4">
                    <a href="#demo" 
                       class="px-6 py-3 bg-gradient-to-r from-orange-500 to-pink-500 text-white font-semibold rounded-xl shadow-md hover:scale-105 transition-transform">
                        🚀 Solicita tu demo
                    </a>
                    <a href="#contacto" 
                       class="px-6 py-3 bg-white border border-orange-600 text-orange-600 rounded-xl font-semibold shadow-md hover:bg-orange-50 transition">
                        📩 Contáctanos
                    </a>
                </div>
            </div>

            {{-- Imagen ilustrativa dinámica --}}
            <div class="relative">
                <div class="absolute -top-6 -left-6 w-40 h-40 bg-orange-200 rounded-full blur-3xl opacity-50 animate-pulse"></div>
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" 
                     alt="Ilustración análisis de datos"
                     class="relative z-10 w-full max-w-md mx-auto drop-shadow-2xl">
                <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-orange-300 rounded-full blur-3xl opacity-40 animate-pulse"></div>
            </div>

        </div>
    </section>

    {{-- Sección con beneficios --}}
    <section class="py-20 bg-white px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12">¿Qué obtienes con nuestro análisis?</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="p-8 bg-orange-50 rounded-2xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-4">📊 Insights accionables</h3>
                    <p class="text-gray-600">Descubre patrones ocultos y oportunidades de mejora en tus procesos.</p>
                </div>
                <div class="p-8 bg-orange-50 rounded-2xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-4">⚡ Optimización</h3>
                    <p class="text-gray-600">Reduce costos y maximiza el rendimiento de tu negocio con decisiones basadas en datos.</p>
                </div>
                <div class="p-8 bg-orange-50 rounded-2xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-4">🚀 Crecimiento</h3>
                    <p class="text-gray-600">Impulsa tus ingresos aplicando estrategias de expansión respaldadas por métricas.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

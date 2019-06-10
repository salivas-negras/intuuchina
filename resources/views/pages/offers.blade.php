@extends('layouts.master')

@section('content')
    <header id="internship">
        {{--Elemento NAV--}}
        @include('partials._nav')

        {{--Título de la página--}}
        @include('partials._page-title')
    </header>

    <main>
        {{-- Filtro de ofertas --}}
        @include('partials._filter-by')

        {{-- Tabla de ofertas --}}
        @include('partials._offers-list')
    </main>

    @include('partials._footer')

@endsection
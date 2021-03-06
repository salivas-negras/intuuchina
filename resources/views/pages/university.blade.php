@extends('layouts.master')

@section('title')
    {{ __('meta.title.' . $view_name) }}
@endsection

@section('content')
    @component('components.header')
        @slot('variant', 'primary')
        @slot('header', __('component.header.university'))
    @endcomponent

    <main id="university">

        @component('components.sliders.arrow-slider', ['slides' => App\Program::where('value', 'university')->first()->degrees])
            @slot('name', 'university')
            @slot('id', 'university')
            @slot('action', 'partials.forms._category-slide')

            @if(isset($slides))
                @slot('visible', $slides)
            @endif
        @endcomponent

    </main>

    @include('partials._footer')
@endsection
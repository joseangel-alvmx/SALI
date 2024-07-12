<!doctype html>
<html lang="{{ Config::get('app.locale') }}" {!! config('tablar.layout') == 'rtl' ? 'dir="rtl"' : '' !!}>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    {{-- Custom Meta Tags --}}
    @yield('meta_tags')
    {{-- Title --}}
    <title>
        @yield('title_prefix', config('tablar.title_prefix', ''))
        @yield('title', config('tablar.title', 'Tablar'))
        @yield('title_postfix', config('tablar.title_postfix', ''))
    </title>
    <link rel="stylesheet" href="assets/css/iziToast.min.css">
    <!-- CSS/JS files -->
    @if(config('tablar','vite'))
        @vite('resources/js/app.js')
    @endif
    
    {{-- Livewire Styles --}}
    @livewireStyles
    {{-- Custom Stylesheets (post Tablar) --}}
    @yield('tablar_css')
</head>
@yield('body')
@include('tablar::extra.modal')
<script src="assets/js/iziToast.min.js" type="text/javascript"></script>
{{-- Livewire Script --}}
@livewireScripts
@yield('tablar_js')
</html>

@extends('tablar::page')

@section('title')
Linea
@endsection

@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div>
                <!-- Page pre-title -->
                <h2 class="page-title">
                    {{ __('Reporte de Líneas: ') }}
                </h2>
            </div>
            <!-- Page title actions -->
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        @if(config('tablar', 'display_alert'))
            @include('tablar::common.alert')
        @endif
        <livewire:report-lineas />
    </div>
</div>
@endsection
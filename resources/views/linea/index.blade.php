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
                    {{ __('Listado de registros: ') }}
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="d-flex justify-content-around flex-row">
                <div class="assigned-records-container records-container-lg">
                    <h3 class="records-title"> Registros asignados:</h3>
                    <div class="records-number">{{$counterAssigned}}</div>
                    <i class="ti ti-file-search records-icon"></i>
                </div>
                <div class="applied-records-container records-container-lg">
                    <h3 class="records-title"> Registros aplicados:</h3>
                    <div class="records-number">{{$counterApplied}}</div>
                    <i class="ti ti-file-plus records-icon"></i>
                </div>
                <div class="canceled-records-container records-container-lg">
                    <h3 class="records-title"> Registros cancelados:</h3>
                    <div class="records-number">{{$counterCanceled}}</div>
                    <i class="ti ti-file-minus records-icon"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        @if(config('tablar', 'display_alert'))
            @include('tablar::common.alert')
        @endif
        <livewire:lineas-table />
    </div>
</div>
@endsection
@extends('tablar::page')

@section('title', 'View estado de cuenta')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        View
                    </div>
                    <h2 class="page-title">
                        {{ __('estados de cuenta ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('bancosraws.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Lista de estados de cuenta
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    @if(config('tablar','display_alert'))
                        @include('tablar::common.alert')
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Estado de cuenta Details</h3>
                        </div>
                        <div class="card-body">
                            
<div class="form-group">
<strong>Banco:</strong>
{{ $bancosraw->banco }}
</div>
<div class="form-group">
<strong>Cuenta:</strong>
{{ $bancosraw->cuenta }}
</div>
<div class="form-group">
<strong>Fecha Valor:</strong>
{{ $bancosraw->fecha_valor }}
</div>
<div class="form-group">
<strong>Folio Banco:</strong>
{{ $bancosraw->folio_banco }}
</div>
<div class="form-group">
<strong>Transaccion:</strong>
{{ $bancosraw->transaccion }}
</div>
<div class="form-group">
<strong>Cargo Abono:</strong>
{{ $bancosraw->cargo_abono }}
</div>
<div class="form-group">
<strong>Importe:</strong>
{{ $bancosraw->importe }}
</div>
<div class="form-group">
<strong>Moneda:</strong>
{{ $bancosraw->moneda }}
</div>
<div class="form-group">
<strong>Folio Aceptacion:</strong>
{{ $bancosraw->folio_aceptacion }}
</div>
<div class="form-group">
<strong>Referencia:</strong>
{{ $bancosraw->referencia }}
</div>
<div class="form-group">
<strong>Tipo Movimiento:</strong>
{{ $bancosraw->tipo_movimiento }}
</div>
<div class="form-group">
<strong>Fecha Carga:</strong>
{{ $bancosraw->fecha_carga }}
</div>
<div class="form-group">
<strong>Estatus:</strong>
{{ $bancosraw->estatus }}
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



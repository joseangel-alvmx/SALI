<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Lists
                    </div>
                    <h2 class="page-title">
                        {{ __('Estados de cuenta ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        @if($userrol === 'admin' || $userrol === 'super')
                            <a href="{{ route('bancosraws.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Crear Linea
                            </a>
                        @endif
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
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Estados de cuenta</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Mostrando
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" value="20" size="3"
                                            aria-label="Invoices count" wire:model.live.debounce.300ms="pages">
                                    </div>
                                    lineas
                                </div>
                                <div class="ms-auto text-muted">
                                    Buscar:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                            aria-label="Search invoice" wire:model.live.debounce.300ms="search">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive min-vh-100">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">No.
                                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="6 15 12 9 18 15" />
                                            </svg>
                                        </th>

                                        <th>Banco</th>
                                        <th>Cuenta</th>
                                        <th>Fecha Valor</th>
                                        <th>Folio Banco</th>
                                        <th>Transaccion</th>
                                        <th>Cargo Abono</th>
                                        <th>Importe</th>
                                        <th>Moneda</th>
                                        <th>Folio Aceptacion</th>
                                        <th>Referencia</th>
                                        <th>Tipo Movimiento</th>
                                        <th>Fecha Carga</th>
                                        <th>Estatus</th>

                                        <th class="w-1"></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($bancosraws as $bancosraw)
                                        <tr>

                                            <td>{{ ++$i }}</td>

                                            <td>{{ $bancosraw->banco }}</td>
                                            <td>{{ $bancosraw->cuenta }}</td>
                                            <td>{{ $bancosraw->fecha_valor }}</td>
                                            <td>{{ $bancosraw->folio_banco }}</td>
                                            <td>{{ $bancosraw->transaccion }}</td>
                                            <td>{{ $bancosraw->cargo_abono }}</td>
                                            <td>{{ $bancosraw->importe }}</td>
                                            <td>{{ $bancosraw->moneda }}</td>
                                            <td>{{ $bancosraw->folio_aceptacion }}</td>
                                            <td>{{ $bancosraw->referencia }}</td>
                                            <td>{{ $bancosraw->tipo_movimiento }}</td>
                                            <td>{{ $bancosraw->fecha_carga }}</td>
                                            <td>{{ $bancosraw->estatus }}</td>

                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown">
                                                            Acciones
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                                href="{{ route('bancosraws.show', $bancosraw->id) }}">
                                                                Ver
                                                            </a>
                                                            @if($userrol === 'admin' || $userrol === 'super')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('bancosraws.edit', $bancosraw->id) }}">
                                                                    Editar
                                                                </a>
                                                                <form action="{{ route('bancosraws.destroy', $bancosraw->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        onclick="if(!confirm('Do you Want to Proceed?')){return false;}"
                                                                        class="dropdown-item text-red"><i
                                                                            class="fa fa-fw fa-trash"></i>
                                                                        Eliminar
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {!! $bancosraws->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
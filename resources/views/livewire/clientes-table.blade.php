<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Lista
                    </div>
                    <h2 class="page-title">
                        {{ __('Cliente ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        @if ($userrol == 'admin' || $userrol == 'super')
                            <a href="{{ route('clientes.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Crear Cliente
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
                            <h3 class="card-title">Cliente</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Mostrando
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" value="10" size="3"
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
                                        <th>Cliente</th>
                                        <th>Nombre Cliente</th>
                                        <th>Agente</th>
                                        <th>Ref Bbva</th>
                                        <th>Ref Bnx</th>
                                        <th>Ref Otr</th>
                                        <th>Vendedor</th>
                                        <th>Nombre Vendedor</th>
                                        <th>Gerente</th>
                                        <th>Sucursal</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ $cliente->cliente }}</td>
                                            <td>{{ $cliente->nombre_cliente }}</td>
                                            <td>{{ $cliente->agente }}</td>
                                            <td>{{ $cliente->ref_bbva }}</td>
                                            <td>{{ $cliente->ref_bnx }}</td>
                                            <td>{{ $cliente->ref_otr }}</td>
                                            <td>{{ $cliente->vendedor }}</td>
                                            <td>{{ $cliente->nombre_vendedor }}</td>
                                            <td>{{ $cliente->gerente }}</td>
                                            <td>{{ $cliente->cedis }}</td>

                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown">
                                                            Acciones
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                                href="{{ route('clientes.show', $cliente->cliente) }}">
                                                                Ver
                                                            </a>
                                                            @if ($userrol == 'admin' || $userrol == 'super')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('clientes.edit', $cliente->cliente) }}">
                                                                    Editar
                                                                </a>
                                                                <form
                                                                    action="{{ route('clientes.destroy', $cliente->cliente) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        onclick="if(!confirm('Do you Want to Proceed?')){return false;}"
                                                                        class="dropdown-item text-red"><i
                                                                            class="fa fa-fw fa-trash"></i>
                                                                        Borrar
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
                            {!! $clientes->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
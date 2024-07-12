<div>
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-body border-bottom py-3">
                    <div
                        class="d-flex gap-3 text-muted border-bottom pb-2 {{$showMore ? "mb-2" : ""}} align-items-center">
                        <button wire:click="setFilter('todos')"
                            class="{{ $filter === 'todos' ? 'selected-filter' : 'unselected-filter' }}">Todos</button>
                        <button wire:click="setFilter('new')"
                            class="{{ $filter === 'new' ? 'selected-filter' : 'unselected-filter' }}">Nuevos</button>
                        <button wire:click="setFilter('asi')"
                            class="{{ $filter === 'asi' ? 'selected-filter' : 'unselected-filter'}}">Asignados</button>
                        <button wire:click="setFilter('apl')"
                            class="{{ $filter === 'apl' ? 'selected-filter' : 'unselected-filter' }}">Aplicados</button>
                        <button wire:click="setFilter('cnl')"
                            class="{{ $filter === 'cnl' ? 'selected-filter' : 'unselected-filter' }}">Cancelados</button>
                        @if ($userrol == 'admin' || $userrol == 'super')
                            <button wire:click="setFilter('nid')"
                                class="{{ $filter === 'nid' ? 'selected-filter' : 'unselected-filter' }}">No
                                identificados</button>
                        @endif

                        <div class="w-10"></div>
                        <div class="d-flex ms-2 border-form">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                            <input wire:model.live.debounce.300ms="search" type="text" class="no-border"
                                placeholder="Buscar...">
                        </div>
                        <div class="dropdown">
                            <div>
                                <button class="table-state new-state no-btn-status" data-bs-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor"
                                        class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div>
                                        <div class="form-check m-2">
                                            <input class="form-check-input" type="checkbox" wire:model.live="showNo"
                                                id="checkNo">
                                            <label class="form-check-label" for="checNo">
                                                No.
                                            </label>
                                        </div>
                                        <div class="form-check m-2">
                                            <input class="form-check-input" type="checkbox" wire:model.live="showFecha"
                                                id="checkFecha">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Fecha
                                            </label>
                                        </div>
                                        <div class="form-check m-2">
                                            <input class="form-check-input" type="checkbox" wire:model.live="showFolio"
                                                id="checkFolio">
                                            <label class="form-check-label" for="checkFolio">
                                                Folio
                                            </label>
                                        </div>
                                        <div class="form-check m-2">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model.live="showImporte" id="checkImporte">
                                            <label class="form-check-label" for="checkImporte">
                                                Importe
                                            </label>
                                        </div>
                                        <div class="form-check m-2">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model.live="showReferencia" id="checkReferencia">
                                            <label class="form-check-label" for="checkReferencia">
                                                Referencia
                                            </label>
                                        </div>
                                        <div class="form-check m-2">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model.live="showTransaccion" id="checkTransaccion">
                                            <label class="form-check-label" for="checkTransaccion">
                                                Transacción
                                            </label>
                                        </div>
                                        <div class="form-check m-2">
                                            <input class="form-check-input" type="checkbox" wire:model.live="showCodi"
                                                id="checkCodi">
                                            <label class="form-check-label" for="checkCodi">
                                                Cod. Cliente
                                            </label>
                                        </div>
                                        <div class="form-check m-2">
                                            <input class="form-check-input" type="checkbox" wire:model.live="showStatus"
                                                id="checkStatus">
                                            <label class="form-check-label" for="checkStatus">
                                                Status
                                            </label>
                                        </div>
                                        <div class="form-check m-2">
                                            <input class="form-check-input" type="checkbox" wire:model.live="showCobro"
                                                id="checkCobro">
                                            <label class="form-check-label" for="checkCobro">
                                                Cobro
                                            </label>
                                        </div>
                                        <div class="form-check m-2">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model.live="showAsignado" id="checkAsignado">
                                            <label class="form-check-label" for="checkAsignado">
                                                Asignado a:
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="table-state new-state no-btn-status" wire:click="toogleShowMore">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            </svg>
                        </button>
                    </div>
                    @if ($showMore)
                        <div class="d-flex gap-3 justify-content-between">
                            <div>
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="text-muted">Banco</div>
                                    <div>BBVA</div>
                                    <button class="no-btn-status" wire:click="toggleShowAccounts()">
                                        @if (!$showAccounts)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 5l0 14" />
                                                <path d="M5 12l14 0" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-minus">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l14 0" />
                                            </svg>
                                        @endif
                                    </button>
                                </div>
                                @if ($showAccounts)
                                    @foreach ($accounts as $account)
                                        <div class="d-flex gap-2 align-items-center">
                                            <div></div>
                                            <div class="text-muted">Cuenta</div>
                                            <div>{{$account}}</div>
                                            <button class="no-btn-status" wire:click="toggleAccounts('{{$account}}')">
                                                @if (!$accountsShow[$account])
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M12 5l0 14" />
                                                        <path d="M5 12l14 0" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-minus">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l14 0" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
                <div class="table-responsive min-vh-100">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                @if($showNo)
                                    <th class="w-1">No.
                                    </th>
                                @endif
                                @if($showFecha)
                                    <th>Fecha</th>
                                @endif
                                @if($showFolio)
                                    <th>
                                        <button wire:click="setOrder('folio_banco')" class="no-btn-table">
                                            Folio
                                            @if($sortField == 'folio_banco')
                                                @if($sortDirection == 'asc')
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 15 12 9 18 15" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 9 12 15 18 9" />
                                                    </svg>
                                                @endif
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="6 9 12 15 18 9" />
                                                </svg>
                                            @endif
                                        </button>
                                    </th>
                                @endif
                                @if($showImporte)
                                    <th>
                                        <button wire:click="setOrder('importe')" class="no-btn-table">
                                            Importe
                                            @if($sortField == 'importe')
                                                @if($sortDirection == 'asc')
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 15 12 9 18 15" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 9 12 15 18 9" />
                                                    </svg>
                                                @endif
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="6 9 12 15 18 9" />
                                                </svg>
                                            @endif
                                        </button>
                                    </th>
                                @endif
                                @if($showReferencia)
                                    <th>
                                        <button wire:click="setOrder('referencia_unica')" class="no-btn-table">
                                            Referencia Bancaria
                                            @if($sortField == 'referencia_unica')
                                                @if($sortDirection == 'asc')
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 15 12 9 18 15" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 9 12 15 18 9" />
                                                    </svg>
                                                @endif
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="6 9 12 15 18 9" />
                                                </svg>
                                            @endif
                                        </button>
                                    </th>
                                @endif
                                @if($showTransaccion)
                                    <th>Transacción</th>
                                @endif
                                @if($showCodi)
                                    <th>Cod. Cliente</th>
                                @endif
                                @if($showStatus)
                                    <th>Estatus</th>
                                @endif
                                @if($showCobro)
                                    <th>No. Cobro</th>
                                @endif
                                @if($showAsignado)
                                    <th>Asignado a:</th>
                                @endif
                                @if($showTipo)
                                    <th>Tipo Operación</th>
                                @endif
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($lineas as $linea)
                                <tr>
                                    @if($showNo)
                                        <td>{{ $linea->id }}</td>
                                    @endif
                                    @if($showFecha)
                                        <td>{{ $linea->fecha_movimiento }}</td>
                                    @endif
                                    @if($showFolio)
                                        <td>{{ $linea->folio_banco }}</td>
                                    @endif
                                    @if($showImporte)
                                        <td>{{ $linea->importe }}</td>
                                    @endif
                                    @if($showReferencia)
                                        <td>{{ $linea->referencia }}</td>
                                    @endif
                                    @if($showTransaccion)
                                        <td>{{ $linea->transaccion }}</td>
                                    @endif
                                    @if($showCodi)
                                        <td>{{ $linea->cliente }}</td>
                                    @endif
                                    @if($showStatus)
                                        <td>
                                            @if ($linea->descripcion === 'Nuevo')
                                                <button type="button" class="table-state new-state no-btn-status"
                                                    data-bs-toggle="modal" data-bs-target="#create-asignacion-modal"
                                                    wire:click="$dispatch('createAsignacion',{lineaId: {{$linea->id}}})">
                                                    {{ $linea->descripcion }}
                                                </button>
                                            @elseif ($linea->estado === "asi" && ($userrol === "admin" || $userUsuario === $linea->agente_asignado))
                                                <div class="dropdown">
                                                    <button
                                                        class="table-state {{$linea->descripcion === 'Asignado' ? "assigned-state" : "" }} no-btn-status "
                                                        data-bs-toggle="dropdown">
                                                        {{ $linea->descripcion }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <button class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#aplicar-registro-modal"
                                                            wire:click="$dispatch('aplicarAsignacion',{lineaId: {{$linea->id}}})">Aplicar</button>
                                                        @if ($userrol === "admin" || $userrol === "super")
                                                            <button class="dropdown-item text-red" data-bs-toggle="modal"
                                                                data-bs-target="#confirmar-resignación-modal"
                                                                wire:click="$dispatch('confirmarReasignacion',{lineaId: {{$linea->id}}})">Reasignar</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            @elseif ($linea->descripcion === 'Aplicado' && ($userrol === "admin" || $userrol === "super"))
                                                <div class="dropdown">
                                                    <button
                                                        class="table-state {{$linea->descripcion === "Aplicado" ? "applied-state" : "" }} no-btn-status "
                                                        data-bs-toggle="dropdown">
                                                        {{ $linea->descripcion }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <button class="dropdown-item text-red" data-bs-toggle="modal"
                                                            data-bs-target="#confirm-cancel-modal"
                                                            wire:click="$dispatch('cancelarModal',{lineaId: {{$linea->id}}})">Cancelar</button>
                                                    </div>
                                                </div>
                                            @else
                                                <div
                                                    class="table-state {{$linea->descripcion === 'Asignado' ? "assigned-state" : ($linea->descripcion === "Aplicado" ? "applied-state" : ($linea->descripcion === "Cancelado" ? "canceled-state" : ""))}}">
                                                    {{ $linea->descripcion }}
                                                </div>
                                            @endif
                                        </td>
                                    @endif
                                    @if($showCobro)
                                        <td>{{ $linea->cobro }}</td>
                                    @endif
                                    @if($showAsignado)
                                        <td>{{ $linea->agente_asignado }}</td>
                                    @endif
                                    @if($showTipo)
                                        <td>{{ $linea->tipo_operacion }}</td>
                                    @endif
                                    <td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {!! $lineas->links('tablar::pagination') !!}
                </div>
            </div>
        </div>
    </div>
    <livewire:create-asignacion />
    <livewire:confirm-cancel-modal />
    <livewire:confirmar-reasignacion-modal />
    <livewire:aplicar-registro />
</div>
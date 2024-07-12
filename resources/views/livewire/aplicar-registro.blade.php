<div>
    <div class="modal fade {{$class}}" id="aplicar-registro-modal" tabindex="-1"
        aria-labelledby="aplicarAsignacionTitle" style="{{$style}}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-blue">
                <div>
                    <div class="modal-header modal-blue-header">
                        <h1 class="modal-title fs-10" id="aplicarAsignacionTitle">Aplicar registro</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check records-icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M9 12l2 2l4 -4" />
                        </svg>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex  flex-row">
                            <div class="w-60">
                                <div class="form-group d-flex gap-5">
                                    <p class="col-sm-3">Banco</p>
                                    @if($banco != null)
                                        <p class="">{{$banco->nombre_banco}}</p>
                                    @endif
                                </div>
                                <div class="form-group d-flex gap-5">
                                    <p class="col-sm-3">Fecha</p>
                                    @if($linea != null)
                                        <p>{{$linea->fecha_movimiento}}</p>
                                    @endif
                                </div>
                                <div class="form-group d-flex gap-5">
                                    <p class="col-sm-3">Importe</p>
                                    @if($linea != null)
                                        <p>${{number_format($linea->importe, 2, ".", ",")}}</p>
                                    @endif
                                </div>
                                <div class="form-group d-flex gap-5">
                                    <p class="col-sm-3">Cod. Cliente.</p>
                                    <div class="col-sm-8">
                                        <input class="form-control form-control-sm form-control-rounded" type="text"
                                            wire:model.live.debounce.300ms="idCliente">
                                    </div>
                                </div>
                                <div class="form-group d-flex gap-5">
                                    <p class="col-sm-3">Nombre</p>
                                    @if($cliente != null)
                                        <p>{{$cliente->nombre_cliente}}</p>
                                    @endif
                                    <p></p>
                                </div>
                                <div class="form-group d-flex gap-5">
                                    <p class="col-sm-3">Cobro:</p>
                                    <div class="col-sm-8">
                                        <input class="form-control form-control-sm form-control-rounded" type="text"
                                            wire:model="cobro">
                                    </div>
                                </div>
                                <div class="form-group d-flex gap-5">
                                    <p class="col-sm-3">Depósito:</p>
                                    <div class="col-sm-8">
                                        <input class="form-control form-control-sm form-control-rounded" type="text"
                                            wire:model="deposito">
                                    </div>
                                </div>
                                @if ($errorMessage != null)
                                    <div class="alert alert-danger" role="alert">
                                        {{$errorMessage}}
                                    </div>
                                @endif
                            </div>
                            <div class="d-flex flex-column justify-content-between align-items-end w-40">
                                <div class="form-group">
                                    <p>Referencia Unica:</p>
                                    @if($linea != null)
                                        <div class="d-flex gap-5 justify-content-center align-items-center text-center">
                                            <p class="user-select-none text-center m-0 reference-modal">
                                                {{$linea->referencia_unica}}
                                            </p>

                                            <button class="no-btn-status btn-copy" wire:click="copiarReferencia()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-check text-primary">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                                    <path
                                                        d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                                    <path d="M9 14l2 2l4 -4" />
                                                </svg>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-aplicar"  {{ $idCliente != null && $cobro != null && $deposito != null? 'data-bs-dismiss="modal"':''}}
                                        wire:click="guardar()" >Aplicar</button>
                                    <button type="button" class="btn btn-cancelar" wire:click="cancelar()"
                                        data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </>
                </div>
            </div>
        </div>
    </div>
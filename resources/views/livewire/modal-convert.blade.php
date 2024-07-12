<div>
    <div class="modal fade {{$class}}" id="modal-convert" tabindex="-1" aria-labelledby="convertirLineasTitle"
        style="{{$style}}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-blue">
                <div>
                    <div class="modal-header modal-blue-header">
                        <h1 class="modal-title fs-10" id="aplicarAsignacionTitle">Convertir Lineas</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check records-icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M9 12l2 2l4 -4" />
                        </svg>
                    </div>
                    <div class="modal-body">
                        @if ($selectedLines != null)
                            <!-- Text input for title -->
                            <p>Esta seguro de convertir estas lineas?:</p>
                        @else
                            <p>Espere un momento</p>
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        wire:click="setLines()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>
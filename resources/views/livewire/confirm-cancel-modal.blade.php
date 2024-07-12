<div wire:ignore.self>
    <div class="modal fade {{$class}}" id="confirm-cancel-modal" tabindex="-1" aria-labelledby="cancelModalTitle" style="{{$style}}"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-blue">
                <div class="modal-header modal-blue-header">
                    <h1 class="modal-title fs-10" id="cancelModalTitle">Cancelar Linea</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseas cancelar este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="cancelar()" data->Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
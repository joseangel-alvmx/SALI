<div wire:ignore.self>
    <div class="modal fade {{$class}}" id="create-asignacion-modal" tabindex="-1" aria-labelledby="asignacionModalTitle" style="{{$style}}"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-blue">
                <div class="modal-header modal-blue-header">
                    <h1 class="modal-title fs-10" id="asignacionModalTitle">Crear Asignación</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($userrol == 'admin' || $userrol == 'super')
                    <!-- Text input for title -->
                    <p>Asigna un usuario a esta linea:</p>
                    <!-- Select user with dropdown -->
                    <x-select name="user_selected" :options="$users" label="Usuario" wire:model="user_selected" />
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" wire:model="self" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Asignarse a si mismo
                        </label>
                    </div>
                    @else
                        <p>Deseas asignarte este registro?</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="asignar()" data->Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
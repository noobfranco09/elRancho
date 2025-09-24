<div wire:ignore.self>
    <x-modal
        id="modal-animal"
        title="Crear animal"
        action="#"
        method="POST"
        maxWidth="2xl"
    >

        <div class="grid grid-cols-2 gap-6">
            <x-form.input name="nombre" wire:model="nombre" label="Nombre"   required />

            <x-form.input name="codigo" wire:model="codigo" label="Codigo"   required />

            <x-form.input name="precio" type="number" wire:model="precio" label="Precio"   required />

            <x-form.input name="imagen" wire:model="imagen" label="Imagen"   required />

            <x-form.input name="sexo" wire:model="sexo" label="Sexo"   required />

            <x-form.input  name="color" name="color" wire:model="color" label="Color"   required />

            <x-form.input name="marcas" wire:model="marcas" label="Marcas"   required />

            <x-form.input name="salud" wire:model="salud" label="Salud"   required />

            <x-form.input name="fecha" type="date" wire:model="fechaNacimiento" label="Fecha de nacimiento"   required />

            <x-form.input name="estado" wire:model="estado" label="Estado"   required />
        </div>

        <x-slot:footer>

            <x-button variant="secondary" data-modal-hide="modal-animal" data-modal-target="modal-animal" >
                Cancelar
            </x-button>

            <x-button variant="primary" wire:click="save" data-modal-hide="modal-animal">
                Guardar
            </x-button>

        </x-slot:footer>
    </x-modal>
</div>
@script
<script>
    document.addEventListener('abrirModalAnimal', () => {
        const target = document.querySelector("#modal-animal");
        modal = new Modal(target);
        modal.toggle();
    });
</script>
@endscript

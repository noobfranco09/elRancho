<!-- resources/views/components/form/file-input.blade.php -->
@props([
    'label' => 'Seleccionar archivo',
    'id' => 'file_input',
    'name' => 'file',
    'accept' => null,
    'showPreview' => false,
    'maxSize' => null, // en MB
    'helper' => null,
    'error' => null,
])
<div
    x-data="{
        fileName: '',
        fileUrl: null,
        fileSize: null,
        isDragging: false,
        error: '{{ $error }}',
        onFileChange(e) {
            const file = e.target.files[0];
            if (!file) {
                this.reset();
                return;
            }

            // Validar tamaño si está definido
            @if($maxSize)
            if (file.size > {{ $maxSize }} * 1024 * 1024) {
                this.error = 'El archivo excede el tamaño máximo de {{ $maxSize }}MB';
                this.reset();
                return;
            }
            @endif

            this.error = '';
            this.fileName = file.name;
            this.fileSize = this.formatFileSize(file.size);

            if (file.type && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (ev) => { this.fileUrl = ev.target.result; };
                reader.readAsDataURL(file);
            } else {
                this.fileUrl = null;
            }
        },
        reset() {
            this.$refs.input.value = '';
            this.fileName = '';
            this.fileUrl = null;
            this.fileSize = null;
        },
        formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
        },
        onDrop(e) {
            this.isDragging = false;
            const file = e.dataTransfer.files[0];
            if (file) {
                this.$refs.input.files = e.dataTransfer.files;
                this.onFileChange({ target: { files: [file] } });
            }
        }
    }"
    class="w-full"
>
    <!-- Zona de drop -->
    <div
        @dragover.prevent="isDragging = true"
        @dragleave.prevent="isDragging = false"
        @drop.prevent="onDrop($event)"
        :class="{
            'border-blue-500 bg-blue-50': isDragging,
            'border-red-300 bg-red-50': error,
            'border-gray-300 bg-gray-50': !isDragging && !error
        }"
        class="relative rounded-xl border-2 border-dashed transition-all duration-200 hover:border-gray-400"
    >
        <!-- Estado sin archivo -->
        <div x-show="!fileName" class="p-8 text-center">
            <div class="mb-4 flex justify-center">
                <span class="material-symbols-outlined text-5xl text-gray-400" :class="{ 'text-blue-500': isDragging }">
                    cloud_upload
                </span>
            </div>

            <label for="{{ $id }}" class="cursor-pointer">
                <span class="text-base font-medium text-green-500 hover:text-green-900">
                    Haz clic para subir
                </span>
                <span class="text-gray-500"> o arrastra y suelta</span>
            </label>

            @if($helper || $accept || $maxSize)
            <p class="mt-2 text-sm text-gray-500">
                @if($accept)
                    {{ str_replace(',', ', ', $accept) }}
                @endif
                @if($maxSize)
                    @if($accept) · @endif
                    Máx. {{ $maxSize }}MB
                @endif
                @if($helper && !$accept && !$maxSize)
                    {{ $helper }}
                @endif
            </p>
            @endif
        </div>

        <!-- Estado con archivo seleccionado -->
        <div x-show="fileName" class="p-6">
            <div class="flex items-start gap-4">
                <!-- Icono o preview -->
                <div class="flex-shrink-0">
                    <template x-if="fileUrl && {{ $showPreview ? 'true' : 'false' }}">
                        <img :src="fileUrl" alt="Preview" class="h-16 w-16 rounded-lg object-cover border border-gray-200" />
                    </template>
                    <template x-if="!fileUrl || !{{ $showPreview ? 'true' : 'false' }}">
                        <div class="h-16 w-16 rounded-lg bg-blue-100 flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl text-blue-600">description</span>
                        </div>
                    </template>
                </div>

                <!-- Info del archivo -->
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate" x-text="fileName"></p>
                    <p class="text-sm text-gray-500 mt-1" x-text="fileSize"></p>

                    <div class="mt-3 flex items-center gap-3">
                        <label for="{{ $id }}" class="text-sm text-green-600 hover:text-green-700 font-medium cursor-pointer">
                            Cambiar archivo
                        </label>
                        <button
                            type="button"
                            @click="reset()"
                            class="text-sm text-gray-500 hover:text-gray-700 font-medium transition"
                        >
                            Eliminar
                        </button>
                    </div>
                </div>

                <!-- Check icon -->
                <div class="flex-shrink-0">
                    <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                        <span class="material-symbols-outlined text-lg text-green-600">check</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input oculto -->
        <input
            id="{{ $id }}"
            name="{{ $name }}"
            type="file"
            x-ref="input"
            @change="onFileChange($event)"
            class="sr-only"
            @if ($accept) accept="{{ $accept }}" @endif
            {{ $attributes }}
        >
    </div>

    <!-- Mensaje de error -->
    <template x-if="error">
        <div class="mt-2 flex items-center gap-2 text-sm text-red-600">
            <span class="material-symbols-outlined text-base">error</span>
            <span x-text="error"></span>
        </div>
    </template>

</div>

<div class="relative {{ $span }}">
    <input
        type="{{ $type }}"
        id="{{ $attributes->get('id', $label) }}" {{-- Usa el ID existente o genera uno basado en $label --}}
        value="{{ $value }}"
        placeholder=" " {{-- IMPORTANTE: El placeholder debe estar vacío o ser un espacio para que funcione el floating label --}}
        @if($required) required @endif
        {{-- Combina clases por defecto con cualquier clase adicional que se pase al componente --}}
        {{ $attributes->merge([
            'class' => 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary-600 peer',
            'id' => $attributes->get('id', $label) // Asegúrate de que el merge también incluya el ID
        ]) }}
    >
    <label
        for="{{ $attributes->get('id', $label) }}"
        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-primary-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1"
    >
        {{ $label }}
    </label>
</div>

@props([
    'icon' => null,
])

<div class="flex {{ $span }}">

    {{-- CONTENEDOR DEL ICONO (MODIFICADO para usar la propiedad $icon) --}}
    @if ($icon)
        {{-- Clases para el Icon Group: --}}
        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
            <span class="material-symbols-outlined shrink-0 text-lg">
                {{ $icon }}
            </span>
        </span>
    @endif

    {{-- CONTENEDOR RELATIVO PARA EL INPUT Y EL LABEL FLOTANTE --}}
    <div class="relative w-full">
        <input
            type="{{ $type }}"
            id="{{ $attributes->get('id', $label) }}"
            value="{{ $value }}"
            placeholder=" "
            @if($required) required @endif
            @if(isset($disabled) && $disabled) disabled @endif

            {{-- Combina clases por defecto con cualquier clase adicional que se pase al componente --}}
            {{ $attributes->merge([
                // Ajuste de padding/espacio
                'class' => (($label) ? 'pt-4 ' : 'pt-2.5 ') .
                           // Si hay icono, quitamos el redondeo de inicio (rounded-s-none) y el borde inicial (border-s-0)
                           ($icon ? 'rounded-s-none border-s-0 ' : '') .

                           // Clases base
                           'block px-2.5 pb-2.5 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary-600 peer ' .

                           //CLASES CONDICIONALES PARA 'disabled'
                           ((isset($disabled) && $disabled) ? 'text-disabled-500 bg-disabled-100 cursor-not-allowed' : 'bg-white focus:shadow-sm'),

                'id' => $attributes->get('id', $label)
            ]) }}
        >
        @if ($label)

        <label
            for="{{ $attributes->get('id', $label) }}"
            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-primary-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1"
        >
            {{ $label }}
        </label>

        @endif
    </div>
</div>

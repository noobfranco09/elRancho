<div class="relative {{ $span }}">
    <input
        type="{{ $type }}"
        id="{{ $attributes->get('id', $label) }}"
        value="{{ $value }}"
        placeholder=" "
        @if($required) required @endif
        {{--AÑADIR ATRIBUTO 'disabled' si $disabled es true (o existe) --}}
        @if(isset($disabled) && $disabled) disabled @endif

        {{-- Combina clases por defecto con cualquier clase adicional que se pase al componente --}}
        {{ $attributes->merge([
            'class' => (($label) ? 'pt-4 ' : 'pt-2.5 ') .
                       'block px-2.5 pb-2.5 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary-600 peer ' .

                       //CLASES CONDICIONALES PARA 'disabled'
                       ((isset($disabled) && $disabled) ? 'text-disabled-500 bg-disabled-200 cursor-not-allowed' : 'bg-white focus:shadow-sm'),

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

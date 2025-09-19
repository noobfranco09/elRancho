<div class="{{ $span }}">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        {{-- Combina clases por defecto con cualquier clase adicional que se pase al componente --}}
        {{ $attributes->merge(['class' => 'bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500']) }}
    >
</div>

@props([
    'label',
    'value' => null, // No necesitamos usar esto directamente, lo manejaremos con wire:model
    'required' => false,
    'options' => [],
    'span' => '',
    'id' => null,
])

<div class="relative {{ $span }}">
    <select
        id="{{ $id ?? $label }}"
        name="{{ $label }}"
        {{ $required ? 'required' : '' }}
        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary-600 peer"
        wire:model="{{ $attributes->get('wire:model') }}"  {{-- Vinculamos al modelo de Livewire --}}
        {{ $attributes }}
    >
        @foreach($options as $value => $text)
            <option class="bg-gray-100" value="{{ $value }}" {{ $value == $this->estado ? 'selected' : '' }}>{{ $text }}</option>
        @endforeach
    </select>

    <label
        for="{{ $id ?? $label }}"
        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-primary-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1"
    >
        {{ $label }}
    </label>
</div>


@props([
    'label' => null,
    'id' => null,
    'rows' => 4,
    'value' => '',
    'required' => false,
])

@php
    use Illuminate\Support\Str;
    $textareaId = $id ?? Str::slug($label ?? 'textarea');
@endphp

<div class="relative">
    <textarea
        id="{{ $textareaId }}"
        rows="{{ $rows }}"
        placeholder=" "
        @if($required) required @endif
        {{ $attributes->merge([
            'class' => 'peer block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900
            bg-transparent rounded-lg border border-gray-300 appearance-none
            focus:outline-none focus:ring-0 focus:border-primary-600'
        ]) }}
    >{{ $attributes->has('name') ? old($attributes->get('name'), $value) : $value }}</textarea>

    @if($label)
        <label for="{{ $textareaId }}"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform
            -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2
            peer-focus:px-2 peer-focus:text-primary-600 peer-focus:dark:text-primary-500
            peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2
            peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75
            peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
            {{ $label }}
        </label>
    @endif
</div>

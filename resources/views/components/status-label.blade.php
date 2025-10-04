@props(['active' => false, 'label'])

<button
    {{ $attributes->merge([
        'class' => "flex items-center justify-center px-3 py-1.5 rounded-md font-medium text-sm transition-colors duration-200 " .
                   ($active
                        ? 'bg-green-100 text-green-700 hover:bg-green-200'
                        : 'bg-red-100 text-red-700 hover:bg-red-200')
    ]) }}
>
    <div
        class="h-2.5 w-2.5 rounded-full {{ $active ? 'bg-green-500' : 'bg-red-500' }} me-2"
    ></div>

    {{ $label }}
</button>

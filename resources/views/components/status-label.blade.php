@props(['active' => false, 'label'])

<div class="flex items-center">
    <div
        class="h-2.5 w-2.5 rounded-full {{ ($active) ? "bg-green-500" : "bg-red-500"}} me-2"
    ></div>

    {{ $label }}
</div>

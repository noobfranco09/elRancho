@props(['cols' => 1])

<div {{ $attributes->merge(['class' => 'grid grid-cols-1 gap-6 lg:grid-cols-'.$cols]) }}>
    <div
        class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm"
    >
        {{ $slot }}
    </div>
</div>

@props(['title'])

<div class="flex justify-between items-center mb-4">
    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $title }}</h3>
    <div>
        {{ $slot }}
    </div>
</div>

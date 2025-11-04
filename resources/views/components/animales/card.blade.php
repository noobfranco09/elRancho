@props([
    'id',
    'name',
    'price',
    'image',
    'sexo' => 'Sin definir',
    'color' => 'Sin definir',
])

<div
    @click="selectedAnimals.push({ id: {{ $id }}, name: '{{ $name }}', price: {{ $price }}, image: '{{ $image }}' })"
    {{ $attributes->merge([
        'class' => 'group bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 cursor-pointer hover:-translate-y-1'
    ]) }}

>
    <div class="relative overflow-hidden rounded-t-xl">
        <img
            src="{{ $image }}"
            alt="{{ $name }}"
            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300"
        >
    </div>

    <div class="p-4 space-y-2">
        <h5 class="text-lg font-semibold text-gray-900">{{ $name }}</h5>

        <div class="text-sm text-gray-600 space-y-1">
            <p><span class="font-medium text-gray-700">Sexo:</span> {{ $sexo }}</p>
            <p><span class="font-medium text-gray-700">Color:</span> {{ $color }}</p>
        </div>

        <div class="pt-2">
            <p class="text-xl font-bold text-green-600">${{ number_format($price, 0, ',', '.') }}</p>
        </div>

    </div>
</div>

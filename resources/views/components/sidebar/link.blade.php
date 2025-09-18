@props([
    "icon",
    "title",
    "selected" => false,
    "src" => "#"
])
<a
    href="{{ $src }}"
    class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm {{ ($selected) ? "bg-primary-100 text-primary-700" : "text-gray-600 hover:bg-gray-100" }}"
>
    <span
        class="material-symbols-outlined shrink-0 text-lg"
        >{{ $icon }}</span
    >
    <span class="sidebar-text"
        >{{ $title }}</span
    >
</a>

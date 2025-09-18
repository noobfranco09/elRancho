@props(["icon", "title"])
<a
    href="#"
    class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-500 hover:bg-gray-100"
>
    <span
        class="material-symbols-outlined shrink-0 text-lg"
        >{{ $icon }}</span
    >
    <span class="sidebar-text"
        >{{ $title }}</span
    >
</a>

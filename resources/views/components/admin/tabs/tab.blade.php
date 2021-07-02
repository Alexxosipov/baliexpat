@props(['href', 'is_active'])
<a
    href="{{ $href }}"
    class="inline-flex items-center font-bold @if($isActive) bg-gray-700 text-gray-100 @else bg-gray-100 text-gray-700 @endif px-2 py-1 text-sm rounded"
    >
    {{ $slot }}
</a>

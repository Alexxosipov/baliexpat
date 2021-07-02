@props(['href'])
<a
    href="{{ $href }}"
   class="inline-flex items-center px-5 py-2 bg-blue-600 text-sm text-white rounded uppercase font-bold tracking-wide"
>
    {{ $slot }}
</a>

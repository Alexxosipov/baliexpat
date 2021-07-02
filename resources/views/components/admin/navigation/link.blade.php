@props(['href', 'label'])

<a href="{{ $href }}" class="text-blue-100 hover:text-white font-bold text-md mt-2 px-4 block" {{ $attributes }}>
    <span>{{ $slot }}</span>
    @if(isset($label) && $label)
        <span class="ml-1 p-1 font-medium bg-blue-100 text-blue-800 text-xs rounded-full">{{ $label }}</span>
    @endif
</a>

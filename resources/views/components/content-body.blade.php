@props(['withOverflowHidden', 'noWhiteBackground', 'marginTop'])
@php
    $wrapper = 'px-4 sm:px-6 lg:px-8';
    $overflow = 'overflow-hidden';
    $innerWrapper = 'p-6';
    $bg = 'bg-white';
    $shadow = 'shadow';
    $borders = 'border-b border-gray-200';
    $rounded = 'rounded-lg';
    $marginTop = isset($marginTop) ? "mt-{$marginTop}" : 'mt-12';

    if (isset($withOverflowHidden) && $withOverflowHidden === false) {
        $overflow = '';
    }

    if (isset($noWhiteBackground)) {
        $bg = '';
        $shadow = '';
        $borders = '';
        $rounded = '';
        $innerWrapper = '';
    }

@endphp
<div class="max-w-7xl mx-auto {{ $overflow }} {{ $marginTop }} {{ $wrapper }}">
    <div class="{{ $bg }} {{ $innerWrapper }} {{ $borders }} {{ $shadow }} {{ $rounded }}">
        {{ $slot }}
    </div>
</div>

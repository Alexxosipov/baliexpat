<table class="table w-full text-sm">
    @if(isset($header))
        <thead>
        <tr class="bg-blue-50 text-blue-600 font-bold text-left">
            {{ $header }}
        </tr>
        </thead>
    @endif
    <tbody>
        {{ $content }}
    </tbody>
</table>
<div class="mt-6">{{ $pagination ?? ''}}</div>

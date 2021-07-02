@props(['property'])

<div class="inline-flex space-x-4 my-6">
    @if(!$property->moderated_at && $property->needs_manual_moderation)
        <form action="{{ route('admin.properties.moderate', compact('property')) }}" method="POST">
            @csrf
            <x-button>Moderate</x-button>
        </form>
    @endif
    @if($property->hided_at)
        <form action="{{ route('admin.properties.returnToSearch', compact('property')) }}" method="POST">
            @csrf
            <x-button>Return to search</x-button>
        </form>
    @else
        <form action="{{ route('admin.properties.hide', compact('property')) }}" method="POST">
            @csrf
            <x-button>Hide</x-button>
        </form>
    @endif
    <x-link :href="$property->url" target="_blank">Visit property</x-link>
</div>

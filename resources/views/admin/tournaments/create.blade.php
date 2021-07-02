<x-admin-layout>
    <x-slot name="header">
        <x-admin.header title="Create a tournament"></x-admin.header>
    </x-slot>

    <form action="{{ route('admin.tournaments.store') }}" method="POST">
        @csrf
        <div>
            <x-label for="name">Name</x-label>
            <x-input id="name" name="name" type="text" required/>
        </div>
        <div class="mt-1">
            <x-button>Create</x-button>
        </div>
    </form>
</x-admin-layout>

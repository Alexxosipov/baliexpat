<x-admin-layout>
    <x-slot name="header">
        <x-admin.header title="Create a sponsor"></x-admin.header>
    </x-slot>

    <x-auth-validation-errors/>
    <form action="{{ route('admin.sponsors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <x-label for="name">Name</x-label>
            <x-input id="name" name="name" type="text" required/>
        </div>
        <div>
            <x-label for="description">Description</x-label>
            <x-input id="description" name="description" type="text" required/>
        </div>
        <div class="mt-1">
            <x-label for="logo">Background</x-label>
            <x-input id="logo" name="background" type="file" required/>
        </div>
        <div class="mt-1">
            <x-label for="logo">Logo</x-label>
            <x-input id="logo" name="logo" type="file" required/>
        </div>
        <div class="mt-1">
            <x-button>Create</x-button>
        </div>
    </form>
</x-admin-layout>

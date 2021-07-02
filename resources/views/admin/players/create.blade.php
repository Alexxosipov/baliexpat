<x-admin-layout>
    <x-slot name="header">
        <x-admin.header title="Create a player"></x-admin.header>
    </x-slot>

    <x-auth-validation-errors/>
    <form action="{{ route('admin.players.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <x-label for="first_name">First name</x-label>
            <x-input id="first_name" name="first_name" type="text" required/>
        </div>
        <div class="mt-4">
            <x-label for="last_name">Last name</x-label>
            <x-input id="last_name" name="last_name" type="text" required/>
        </div>
        <div class="mt-4">
            <x-label for="number">Number</x-label>
            <x-input id="number" name="number" type="number" required/>
        </div>
        <div class="mt-4">
            <x-label for="photo">Photo</x-label>
            <x-input id="photo" name="photo" type="file" required/>
        </div>
        <div class="mt-4">
            <x-label for="position_id">Position</x-label>
            <select id="position_id" name="position_id" class="min-w-[5rem] rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="1">Goalkeeper</option>
                <option value="2">Defender</option>
                <option value="3">Midfielder</option>
                <option value="4">Striker</option>
            </select>
        </div>
        <div class="mt-4">
            <x-button>Create</x-button>
        </div>
    </form>
</x-admin-layout>

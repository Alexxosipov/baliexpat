<x-admin-layout>
    <x-slot name="header">
        <x-admin.header title="Players"></x-admin.header>
    </x-slot>

    <div class="mb-6">
        <x-admin.buttons.link :href="route('admin.players.create')">Create a player</x-admin.buttons.link>
    </div>
    <x-admin.tables.table>
        <x-slot name="header">
            <x-admin.tables.head-cell>Id</x-admin.tables.head-cell>
            <x-admin.tables.head-cell>Number</x-admin.tables.head-cell>
            <x-admin.tables.head-cell>Name</x-admin.tables.head-cell>
            <x-admin.tables.head-cell>Position</x-admin.tables.head-cell>
        </x-slot>
        <x-slot name="content">
            @foreach($players as $player)
                <x-admin.tables.body-row>
                    <x-admin.tables.body-cell>{{ $player->id }}</x-admin.tables.body-cell>
                    <x-admin.tables.body-cell>{{ $player->number }}</x-admin.tables.body-cell>
                    <x-admin.tables.body-cell>{{ $player->full_name }}</x-admin.tables.body-cell>
                    <x-admin.tables.body-cell>{{ $player->position_name }}</x-admin.tables.body-cell>
                </x-admin.tables.body-row>
            @endforeach
        </x-slot>
    </x-admin.tables.table>
</x-admin-layout>

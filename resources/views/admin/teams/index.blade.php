<x-admin-layout>
    <x-slot name="header">
        <x-admin.header title="Teams"></x-admin.header>
    </x-slot>

    <div class="mb-6">
        <x-admin.buttons.link :href="route('admin.teams.create')">Create team</x-admin.buttons.link>
    </div>
    <x-admin.tables.table>
        <x-slot name="header">
            <x-admin.tables.head-cell>Id</x-admin.tables.head-cell>
            <x-admin.tables.head-cell>Name</x-admin.tables.head-cell>
        </x-slot>
        <x-slot name="content">
            @foreach($teams as $team)
                <x-admin.tables.body-row>
                    <x-admin.tables.body-cell>{{ $team->id }}</x-admin.tables.body-cell>
                    <x-admin.tables.body-cell>
                        <div class="inline-flex items-center">
                            <img src="{{ $team->logo_url }}" alt="" class="h-5 w-auto">
                            <span class="ml-1">{{ $team->name }}</span>
                        </div>
                    </x-admin.tables.body-cell>
                </x-admin.tables.body-row>
            @endforeach
        </x-slot>
    </x-admin.tables.table>
</x-admin-layout>

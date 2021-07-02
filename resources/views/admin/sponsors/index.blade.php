<x-admin-layout>
    <x-slot name="header">
        <x-admin.header title="Sponsors"></x-admin.header>
    </x-slot>

    <div class="mb-6">
        <x-admin.buttons.link :href="route('admin.sponsors.create')">Create a sponsor</x-admin.buttons.link>
    </div>
    <x-admin.tables.table>
        <x-slot name="header">
            <x-admin.tables.head-cell>Id</x-admin.tables.head-cell>
            <x-admin.tables.head-cell>Name</x-admin.tables.head-cell>
            <x-admin.tables.head-cell>Actions</x-admin.tables.head-cell>
        </x-slot>
        <x-slot name="content">
            @foreach($sponsors as $sponsor)
                <x-admin.tables.body-row>
                    <x-admin.tables.body-cell>{{ $sponsor->id }}</x-admin.tables.body-cell>
                    <x-admin.tables.body-cell>{{ $sponsor->name }}</x-admin.tables.body-cell>
                    <x-admin.tables.body-cell>...</x-admin.tables.body-cell>
                </x-admin.tables.body-row>
            @endforeach
        </x-slot>
    </x-admin.tables.table>
</x-admin-layout>

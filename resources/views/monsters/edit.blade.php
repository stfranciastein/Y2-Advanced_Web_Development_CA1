<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editing Monster Entry: :name', ['name' => $monster->monster_name]) }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-backgroundpaper bg-cover">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">Monster Details:</h3>
                        
                        <x-monster-form
                            :action="route('monsters.update', $monster)"
                            :method="'PATCH'"
                            :monster="$monster"
                        />

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ _('Create New Monster Entry') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-backgroundpaper bg-cover">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">List of Monsters:</h3>
                        
                        <x-monster-form
                            :action="route('monsters.store')"
                            :method="'POST'"
                        />

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ _('All Monsters') }}
        </h2>
    </x-slot>
    <x-alert-success>
        {{ session('success') }}
    </x-alert-sucess>
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Monsters:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($monsters as $monster)
                            <a href="{{ route('monsters.show', $monster) }}">
                            <x-monster-card
                                :monster_name="$monster->monster_name"
                                :alignment="$monster->alignment"
                                :challenge_rating="$monster->challenge_rating"
                                :armour_class="$monster->armour_class"
                                :image_url="$monster->image_url"
                                :description="$monster->description"
                                :created_at="$monster->created_at"
                                :updated_at="$monster->updated_at"
                            />
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
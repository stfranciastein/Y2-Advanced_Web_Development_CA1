<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ _('All Monsters') }}
        </h2>
    </x-slot>
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
    <div class="min-h-screen bg-backgroundpaper bg-cover">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">List of Monsters:</h3>

                        <!-- Sorting Button -->
                        <div class="mb-4">
                            <button id="sort-button" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">
                                Sort Alphabetically
                            </button>
                        </div>

                        <div id="monster-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($monsters as $monster)
                                <div class="monster-item" data-name="{{ $monster->monster_name }}">
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
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- This script is a work in progress taken from last year's OOPFLIX project 
    It isn't done and you need to finish this/or implement it in its own file!!-->
    <script>
        document.getElementById('sort-button').addEventListener('click', function() {
            const monsterList = document.getElementById('monster-list');
            const monsters = Array.from(monsterList.children);

            monsters.sort((a, b) => {
                const nameA = a.getAttribute('data-name').toLowerCase();
                const nameB = b.getAttribute('data-name').toLowerCase();

                if (nameA < nameB) return -1;
                if (nameA > nameB) return 1;
                return 0;
            });

            // Clear the existing list and append sorted items
            monsterList.innerHTML = '';
            monsters.forEach(monster => {
                monsterList.appendChild(monster);
            });
        });
    </script>
</x-app-layout>

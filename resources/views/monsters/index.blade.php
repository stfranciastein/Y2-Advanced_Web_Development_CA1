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
                        <div class="font-medium flex items-center gap-2">
                            <p>Filter</p>
                            <!-- Sorting Buttons -->
                            <div class="mb-4">
                                <input type="checkbox" id="sort-az-toggle" class="hidden">
                                <label for="sort-az-toggle" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 cursor-pointer">
                                    A-Z
                                </label>
                            </div>
                            <div class="mb-4">
                                <input type="checkbox" id="sort-za-toggle" class="hidden">
                                <label for="sort-za-toggle" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 cursor-pointer">
                                    Z-A
                                </label>
                            </div>
                        </div>


                        <div id="monster-list" class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-6">
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
                                    <div class="flex gap-2 justify-between">
                                        <!-- Edit Button -->
                                        <div class="mt-2">
                                            <a href="{{ route('monsters.edit', $monster) }}" class="text-white bg-slate-700 px-2 py-2 hover:bg-yellow-500">Edit</a>
                                        </div>
                                        <!-- Delete Form -->
                                        <form action="{{ route('monsters.destroy', $monster) }}" method="POST" class="mt-2" onsubmit="return confirm('Are you sure you want to delete this monster?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const monsterList = document.getElementById('monster-list');
        const originalMonsters = Array.from(monsterList.children); // This const saves the original order so you can bring it back when the tickboxes are unchecked.

        // Sort A-Z
        document.getElementById('sort-az-toggle').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('sort-za-toggle').checked = false;
                sortMonsters(true);
            } else {
                resetSort();
            }
        });

        // Sort Z-A
        document.getElementById('sort-za-toggle').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('sort-az-toggle').checked = false;
                sortMonsters(false);
            } else {
                resetSort();
            }
        });

        function sortMonsters(ascending) {
            const monsters = Array.from(monsterList.children);
            monsters.sort((a, b) => {
                const nameA = a.getAttribute('data-name').toLowerCase();
                const nameB = b.getAttribute('data-name').toLowerCase();
                return ascending ? nameA.localeCompare(nameB) : nameB.localeCompare(nameA);
            });
            updateMonsterList(monsters);
        }

        function updateMonsterList(monsters) {
            monsterList.innerHTML = '';
            monsters.forEach(monster => {
                monsterList.appendChild(monster);
            });
        }

        function resetSort() {
            updateMonsterList(originalMonsters);
            document.getElementById('sort-az-toggle').checked = false;
            document.getElementById('sort-za-toggle').checked = false;
        }
    </script>
</x-app-layout>

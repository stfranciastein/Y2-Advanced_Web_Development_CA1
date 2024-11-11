<x-app-layout>
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
    <div class="min-h-screen bg-backgroundpaper bg-cover">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="p-6 text-gray-900">
                        
                        <!-- Component for filter-->
                        <x-monster-filter-form :route="'monsters.index'" :alignments="$alignments" />

                        <!-- Monster List -->
                        <div id="monster-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($monsters as $monster)
                                <div class="monster-item" data-name="{{ $monster->monster_name }}" data-alignment="{{ $monster->alignment }}">
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
                                    <!-- <div class="flex gap-2 justify-between">
                                        
                                        <div class="mt-2">
                                            <a href="{{ route('monsters.edit', $monster) }}" class="text-white bg-neutral-700 px-2 py-2 hover:bg-yellow-500">Edit</a>
                                        </div>
                                        
                                        <form action="{{ route('monsters.destroy', $monster) }}" method="POST" class="mt-2" onsubmit="return confirm('Are you sure you want to delete this monster?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                        </form>
                                    </div> -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/filter.js') <!--Loads the filter.js script to dynamically display names-->
</x-app-layout>
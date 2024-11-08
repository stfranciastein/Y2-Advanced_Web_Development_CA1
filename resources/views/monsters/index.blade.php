<x-app-layout>
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
    <div class="min-h-screen bg-backgroundpaper bg-cover">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="p-6 text-gray-900">
                        <div class="font-medium flex items-center gap-2">
                            <form action="{{ route('monsters.index') }}" method="GET" class="flex gap-4">

                                <!-- Search Bar -->
                                <div class="mb-4 relative">
                                    <input type="text" name="search" id="search-bar" value="{{ request('search') }}" placeholder="Search Monsters" class="border rounded px-4 py-2 w-full" />
                                    
                                    <!-- Dynamic Search Results Dropdown -->
                                    <ul id="search-results" class="absolute bg-white border rounded shadow-lg w-full mt-1 hidden">
                                        <!-- List items will be inserted here by JavaScript -->
                                    </ul>
                                </div>

                                <!-- Alignment Filter -->
                                <div class="mb-4">
                                    <select name="alignment_filter" id="alignment-filter" class="border rounded px-4 py-2">
                                        <option value="showingAll">Show All</option>
                                        @foreach($alignments as $alignment)
                                            <option value="{{ $alignment }}" {{ request('alignment_filter') == $alignment ? 'selected' : '' }}>
                                                {{ $alignment }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Sorting Buttons -->
                                <div class="mb-4">
                                    <button type="submit" name="sort" value="az" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 cursor-pointer">
                                        A-Z
                                    </button>
                                    <button type="submit" name="sort" value="za" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 cursor-pointer">
                                        Z-A
                                    </button>
                                </div>

                                
                            </form>
                        </div>

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
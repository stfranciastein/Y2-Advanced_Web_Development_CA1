<x-app-layout>
    <div class="min-h-screen bg-backgroundpaper bg-cover">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 gap-6">
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="p-6 text-gray-900">
                        @if($favouriteMonsters->isEmpty())
                            <p class="text-lg">You have no favourite monsters yet.</p>
                        @else
                            <x-monster-filter-form :route="'monsters.index'" :alignments="$alignments" />
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="monster-list">
                                @foreach($favouriteMonsters as $monster)
                                    <a href="{{ route('monsters.show', $monster) }}">
                                        <div class="border rounded-lg shadow-md p-5 bg-white hover:shadow-lg transition duration-300 text-center monster-item" data-name="{{ $monster->monster_name }}" data-alignment="{{ $monster->alignment }}">
                                            <h4 class="font-bold text-lg pb-2 uppercase border-b-2 border-gray-400 mb-2">{{ $monster->monster_name }}</h4>
                                            <img src="{{ asset('images/monsters/' . $monster->image_url) }}" alt="{{ $monster->monster_name }}" class="w-100 h-60 object-cover mx-auto border-1">
                                            <div class="text-gray-600 text-sm">
                                                <p class="font-bold py-1 uppercase">{{ $monster->alignment }}</p>
                                                <p><span class="font-bold">CR:</span>{{ $monster->challenge_rating }}</p>
                                                <p><span class="font-bold">AC:</span>{{ $monster->armour_class }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

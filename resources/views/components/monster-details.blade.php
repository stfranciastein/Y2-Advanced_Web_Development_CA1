@props(['monster_name', 'alignment', 'challenge_rating', 'armour_class', 'image_url', 'description', 'created_at', 'updated_at', 'monster_id', 'favourited_by_users_count'])

<div class="lg:flex">
    <div class="flex-1 rounded-lg p-6 bg-white transition duration-300 mx-auto"> 
        <h3 class="font-semibold text-md mb-3">Monsters > {{ $alignment }} > {{ $monster_name }}</h3>
        <img src="{{ asset('images/monsters/' . $image_url) }}" alt="{{ $monster_name }}" class="w-full h-full object-contain">
    </div>
    <div class="flex-1 border rounded-lg p-6 bg-white transition duration-300 mx-auto">
        <h1 class="font-black text-black-600 mb-2 text-5xl uppercase text-center">{{ $monster_name }}</h1>
        <hr class="py-1">
        <ul class="space-y-2">
            <li><span class="font-semibold">Alignment:</span> {{ $alignment }}</li>
            <li><span class="font-semibold">Challenge Rating:</span> {{ $challenge_rating }}</li>
            <li><span class="font-semibold">Armour Class:</span> {{ $armour_class }}</li>
            <li><span class="font-semibold">Description:</span> {{ $description }}</li>
            <li><hr></li>
            <li><p>Stats here (Placeholder)</p></li>
            <li><hr></li>
        </ul>
        <div class="flex gap-2 mt-4">
            <a href="{{ route('monsters.edit', $monster_id) }}" class="bg-neutral-600 text-white py-2 px-4 rounded-md hover:bg-neutral-700 transition duration-200">Edit</a>
            <form action="{{ route('monsters.destroy', $monster_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this monster?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition duration-200">Delete</button>
            </form>
            <form action="{{ route('monsters.favourite', $monster_id) }}" method="POST">
                @csrf
                @if(auth()->user()->favouriteMonsters->contains($monster_id))
                    <button type="submit" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                        </svg>
                    </button>
                @else
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>
                @endif
                <span class="bg-red-500 text-white px-4 py-2 rounded">
                    {{ $favourited_by_users_count }}
                </span>
            </form>
        </div>
    </div>
</div>

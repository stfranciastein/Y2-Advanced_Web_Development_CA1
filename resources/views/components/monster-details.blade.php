@props(['monster_name', 'alignment', 'challenge_rating', 'armour_class', 'image_url', 'description', 'created_at', 'updated_at', 'monster_id'])

<div class="lg:flex">
    <div class="flex-1 rounded-lg p-6 bg-white transition duration-300 mx-auto"> 
        <img src="{{ asset('images/monsters/' . $image_url) }}" alt="{{ $monster_name }}" class="w-full h-full object-cover">
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
        </div>
    </div>
</div>

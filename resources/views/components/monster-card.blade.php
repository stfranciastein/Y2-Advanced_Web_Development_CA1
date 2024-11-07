@props(['monster_name', 'alignment', 'challenge_rating', 'armour_class', 'image_url', 'description', 'created_at', 'updated_at'])

<div class="border rounded-lg shadow-md p-5 bg-white hover:shadow-lg transition duration-300 text-center">
    <h4 class="font-bold text-lg pb-2 uppercase border-b-2 border-gray-400 mb-2">{{ $monster_name }}</h4>
    <img src="{{ asset('images/monsters/' . $image_url) }}" alt="{{ $monster_name }}" class="w-100 h-60 object-cover mx-auto border-1">
    <div class="text-gray-600 text-sm">
        <p class="font-bold py-1 uppercase">{{ $alignment }}</p>
        <p><span class="font-bold">CR:</span>{{ $challenge_rating }}</p>
        <p><span class="font-bold">AC:</span>{{ $armour_class }}</p>
    </div>
</div>

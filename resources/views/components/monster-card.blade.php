@props(['monster_name', 'alignment', 'challenge_rating', 'armour_class', 'image_url', 'description', 'created_at', 'updated'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $monster_name }}</h4>
    <img src="{{ asset('images/monsters/' . $image_url) }}" alt="{{ $monster_name }}" class="w-100 h-60 object-cover mx-auto">
    <p class="text-gray-600">({{ $challenge_rating }}) </p>
    <p class="text-gray-600 mt-4">{{ $description }}</p>    
</div>

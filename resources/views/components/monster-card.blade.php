@props(['monster_name', 'alignment', 'challenge_rating', 'armour_class', 'image_url', 'description', 'created_at', 'updated_at'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $monster_name }}</h4>
    <img src="{{ asset('images/monsters/' . $image_url) }}" alt="{{ $monster_name }}" class="w-100 h-60 object-cover mx-auto">
    <p class="text-gray-600">CR:{{ $challenge_rating }}</p>
    <p class="text-gray-600">AC{{ $armour_class }}</p> 
</div>

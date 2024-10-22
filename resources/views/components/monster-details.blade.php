@props(['monster_name', 'alignment', 'challenge_rating', 'armour_class', 'image_url', 'description', 'created_at', 'updated_at'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto"> 
    <img src="{{ asset('images/monsters/' . $image_url) }}" alt="{{ $monster_name }}" class="w-200 max w-xs h-auto object-cover">
    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{ $monster_name }}
</div>


Your 
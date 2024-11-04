@props(['monster_name', 'alignment', 'challenge_rating', 'armour_class', 'image_url', 'description', 'created_at', 'updated_at'])

<div class="lg:flex">
    <div class="flex-1 rounded-lg p-6 bg-white transition duration-300 mx-auto"> 
        <img src="{{ asset('images/monsters/' . $image_url) }}" alt="{{ $monster_name }}" class="w-full h-full object-cover">
    </div>
    <div class="flex-1 border rounded-lg p-6 bg-white transition duration-300 mx-auto">
        <h1 class="font-bold text-black-600 mb-2 text-5xl uppercase">{{ $monster_name }}</h1>
        <hr class="py-1">
        <ul class="space-y-2">
            <li><span class="font-semibold">Alignment:</span> {{ $alignment }}</li>
            <li><span class="font-semibold">Challenge Rating:</span> {{ $challenge_rating }}</li>
            <li><span class="font-semibold">Armour Class:</span> {{ $armour_class }}</li>
            <li><span class="font-semibold">Description:</span> {{ $description }}</li>
            <li><hr></li>
            <li><p>Stats here (Placeholder)</p></li>
            <li><hr></li>
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/50ZenUP4O2Q5eCy2NRNvuz?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </ul>
    </div>
</div>

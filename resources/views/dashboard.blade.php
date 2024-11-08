<x-app-layout>

<div class="min-h-screen bg-backgroundpaper bg-cover">
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-5">
                <h2 class="font-bold text-2xl lg:pb-3 md:pb-4 pb-5 border-b-2 border-rose-500 mb-3">About</h2>
                <div>
                    <p class="lg:pb-3 md:pb-4 pb-5">Welcome to the Ultimate Monster Manual—a comprehensive and interactive compendium designed to bring a world of fantasy creatures to life. This manual is crafted for adventurers, dungeon masters, storytellers, and any fantasy enthusiast seeking rich, diverse, and unforgettable creatures to enhance their campaigns or dive deeper into the lore of these extraordinary beings.</p>
                    <p class="lg:pb-3 md:pb-4 pb-5">The Monster Manual is your gateway to discovering creatures of every shape, size, and temperament. From ancient dragons that dwell in deep caves and hoard unimaginable riches, to the cunning tricksters hiding in shadowy forests, this manual spans the full spectrum of magical life forms. You’ll encounter creatures that guard ancient secrets, monsters that seek nothing but destruction, and misunderstood beings that may even be persuaded to aid your heroes. Whether you're looking to find terrifying enemies, powerful allies, or curious creatures to flesh out the world, this manual serves as a rich resource for expanding your understanding and appreciation of these beings.</p>
                    <p class="lg:pb-3 md:pb-4 pb-5">Our manual also groups creatures into various types and categories to help you quickly find exactly what you’re looking for. You’ll find beasts and animals rooted in reality but amplified by magic, along with fiends, fey, undead, and otherworldly creatures that defy the laws of nature and reality. Each category is meant to inspire ideas for creating rich encounters and nuanced relationships within your campaign. Need an elusive trickster to stir up some chaos? You’ll find a variety of fey creatures that are perfect for the job. Seeking an opponent with dark intentions and terrifying power? The manual is packed with monstrous fiends and demons that make for formidable foes.</p>
                </div>

                <h2 class="font-bold text-2xl lg:pb-3 md:pb-4 py-5 border-b-2 border-rose-500 mb-3">Index</h2>
                <!-- Group the monsters by the first letter of the name -->
                <!-- This works by getting first letter of the monster and capitalising it -->
                @php
                    $groupedMonsters = $monsters->groupBy(function($monster) {
                            return strtoupper(substr($monster->monster_name, 0, 1)); 
                        });
                @endphp
                <div class="md:flex">
                        <!-- Left side: List of Monsters -->
                        <div class="flex-1 m-5">
                            <h2 class="pb-2 font-medium">All Monsters A-Z</h2>
                            @foreach($groupedMonsters as $letter => $group)
                                <h3 class="font-bold text-l mt-5 mb-1">{{ $letter }}</h3>
                                <ul>
                                    @foreach($group as $monster)
                                        <li class="py-1 pl-2">
                                            <a href="{{ route('monsters.show', $monster) }}" class="text-rose-500 hover:text-rose-700">
                                                {{ $monster->monster_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>

                        <!-- Right side: Most Recent Monster Card -->
                        <div class="flex-1 m-5 max-w-lg">
                            <h2 class="pb-5 font-medium">Recently Edited</h2>
                            @if($recentMonster)
                            <a href="{{ route('monsters.show', $recentMonster) }}">
                                <x-monster-card 
                                    :monster_name="$recentMonster->monster_name"
                                    :alignment="$recentMonster->alignment"
                                    :challenge_rating="$recentMonster->challenge_rating"
                                    :armour_class="$recentMonster->armour_class"
                                    :image_url="$recentMonster->image_url"
                                    :description="$recentMonster->description"
                                    :created_at="$recentMonster->created_at"
                                    :updated_at="$recentMonster->updated_at"
                                />
                            </a>
                            @else
                                <p>No recent monsters available.</p>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>

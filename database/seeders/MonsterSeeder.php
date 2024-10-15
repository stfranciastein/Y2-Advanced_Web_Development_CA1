<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Monster;
use Carbon\Carbon;

class MonsterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        Monster::insert([
            [
                'monster_name' => 'Beholder',
                'alignment' => 'Lawful Evil',
                'challenge_rating' => '13',
                'armour_class' => '18',
                'image_url' => 'https://static.wikia.nocookie.net/forgottenrealms/images/2/2c/Monster_Manual_5e_-_Beholder_-_p28.jpg/revision/latest?cb=20200313153220',
                'description' => 'One glance at a beholder is enough to assess its foul and otherworldly nature. Aggressive, hateful, and greedy, these aberrations dismiss all other creatures as lesser beings, toying with them or destroying them as they choose. A beholder\'s spheroid body levitates at all times, and its great bulging eye sits above a wide, toothy maw, while the smaller eyestalks that crown its body twist and turn to keep its foes in sight. When a beholder sleeps, it closes its central eye but leaves its smaller eyes open and alert.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'monster_name' => 'Ancient Red Dragon',
                'alignment' => 'Chaotic Evil',
                'challenge_rating' => '22',
                'armour_class' => '24',
                'image_url' => 'https://www.dndbeyond.com/avatars/thumbnails/30782/405/1000/1000/638061961232915183.png',
                'description' => 'The odor of sulfur and pumice surrounds a red dragon, whose swept-back horns and spinal frill define its silhouette. Its beaked snout vents smoke at all times, and its eyes dance with flame when it is angry.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'monster_name' => 'Mind Flayer',
                'alignment' => 'Lawful Evil',
                'challenge_rating' => '7',
                'armour_class' => '15',
                'image_url' => 'https://static.wikia.nocookie.net/forgottenrealms/images/4/4d/Monster_Manual_5e_-_Mind_Flayer_-_p222.jpg/revision/latest?cb=20200313153220',
                'description' => 'Mind flayers, or illithids, are feared for their psionic powers and hunger for the brains of sentient beings. They use their abilities to control others and see themselves as destined to dominate the multiverse.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'monster_name' => 'Tarrasque',
                'alignment' => 'Unaligned',
                'challenge_rating' => '30',
                'armour_class' => '25',
                'image_url' => 'https://static.wikia.nocookie.net/forgottenrealms/images/f/f9/Monster_Manual_5e_-_Tarrasque_-_p286.jpg/revision/latest?cb=20200313153220',
                'description' => 'The tarrasque is a gargantuan creature of utter destruction. It slumbers for centuries, only to awaken and obliterate everything in its path. The mere sight of it is enough to inspire terror in any who dare to stand against it.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'monster_name' => 'Lich',
                'alignment' => 'Neutral Evil',
                'challenge_rating' => '21',
                'armour_class' => '17',
                'image_url' => 'https://static.wikia.nocookie.net/forgottenrealms/images/d/da/Monster_Manual_5e_-_Lich_-_p202.jpg/revision/latest?cb=20200313153220',
                'description' => 'Liches are powerful undead spellcasters who seek immortality by placing their soul in a phylactery. They are masters of necromancy and use their vast knowledge to scheme and manipulate from the shadows.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'monster_name' => 'Gelatinous Cube',
                'alignment' => 'Unaligned',
                'challenge_rating' => '2',
                'armour_class' => '6',
                'image_url' => 'https://static.wikia.nocookie.net/forgottenrealms/images/a/ad/Monster_Manual_5e_-_Gelatinous_Cube_-_p242.jpg/revision/latest?cb=20200313153220',
                'description' => 'The gelatinous cube is an ooze that silently slides through dungeons, absorbing organic matter in its path. Transparent and nearly invisible, these creatures are deadly to the unwary.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ]
        ]);
    }
}

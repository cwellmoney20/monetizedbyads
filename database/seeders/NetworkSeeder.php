<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Network; // Ensure this path matches your Network model's namespace

class NetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $networks = [
            [
                'name' => 'Mediavine',
                'sellers_json_url' => 'https://www.mediavine.com/sellers.json',
                'class' => 'bg-cyan-600 text-cyan-50'
            ],
            [
                'name' => 'Journey by Mediavine',
                'sellers_json_url' =>
                'https://sellers.journeymv.com/sellers.json',
                'class' => 'bg-indigo-600 text-indigo-50'
            ],
            [
                'name' => 'Raptive',
                'sellers_json_url' => 'https://ads.cafemedia.com/sellers.json',
                'class' => 'bg-violet-600 text-violet-50'
            ],
            [
                'name' => 'Ezoic',
                'sellers_json_url' => 'http://ezoic.ai/sellers.json',
                'class' => 'bg-emerald-600 text-emerald-50'
            ],
            [
                'name' => 'Freestar',
                'sellers_json_url' => 'https://freestar.com/sellers.json',
                'class' => 'bg-yellow-600 text-yellow-50'
            ],
            [
                'name' => 'Newor Media',
                'sellers_json_url' => 'https://newormedia.com/sellers.json',
                'class' => 'bg-zinc-600 text-zinc-50'
            ],
            [
                'name' => 'Monumetric',
                'sellers_json_url' => 'https://monumetric.com/sellers.json',
                'class' => 'bg-orange-600 text-orange-50'
            ],
            [
                'name' => 'Adnimation',
                'sellers_json_url' => 'https://www.adnimation.com/sellers.json',
                'class' => 'bg-pink-600 text-pink-50'
            ],
        ];

        foreach ($networks as $network) {
            Network::create($network);
        }
    }
}

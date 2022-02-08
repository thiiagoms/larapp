<?php

namespace Database\Seeders;

use App\Models\Episodes;
use Illuminate\Database\Seeder;

class EpisodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $episodes = [
            [
                'episodes_quantity' => 10,
                'watched' => false,
                'seasons_id' => 1
            ],
            [
                'episodes_quantity' => 11,
                'watched' => false,
                'seasons_id' => 2
            ],
            [
                'episodes_quantity' => 12,
                'watched' => false,
                'seasons_id' => 3
            ],
            [
                'episodes_quantity' => 13,
                'watched' => false,
                'seasons_id' => 4
            ],
        ];

        foreach ($episodes as $episode) {
            for ($firstEpisode = 1; $firstEpisode < $episode['episodes_quantity']; $firstEpisode++) { 
                Episodes::create([
                    'episodes_quantity' => $firstEpisode,
                    'watched' => false,
                    'seasons_id' => $episode['seasons_id']
                ]);
            }
        }
    }
}

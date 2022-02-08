<?php

namespace Database\Seeders;

use App\Models\Seasons;
use Illuminate\Database\Seeder;

class SeasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = [
            [
                'seasons_quantity' => 4,
                'series_id' => 1
            ],
            [
                'seasons_quantity' => 5,
                'series_id' => 2
            ],
            [
                'seasons_quantity' => 6,
                'series_id' => 3
            ],
            [
                'seasons_quantity' => 7,
                'series_id' => 4
            ]

        ];
        
        foreach($seasons as $season) {
            for ($firstSeason = 1; $firstSeason <= $season['seasons_quantity']; $firstSeason++) {
                Seasons::create([
                    'seasons_quantity' => $firstSeason,
                    'series_id' => $season['series_id']
                ]);
            }
        }
    }
}

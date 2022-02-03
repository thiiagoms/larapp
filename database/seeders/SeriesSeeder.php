<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Series;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = [
            [
                'name' => 'Mr. Robot',
                'description' => 'Mr. Robot follows Elliot, a young programmer who works as a cyber-security engineer by day and as a vigilante hacker by night. Elliot finds himself at a crossroads when the mysterious leader of an underground hacker group recruits him to destroy the firm he is paid to protect.'
            ],
            [
                'name' => 'Grey\'s Anatomy',
                'description' => 'A drama centered on the personal and professional lives of five surgical interns and their supervisors. A medical based drama centered around Meredith Grey, an aspiring surgeon and daughter of one of the best surgeons, Dr. Ellis Grey.'
            ],
            [
                'name' => 'Lost',
                'description' => 'Lost was a fast-paced, suspenseful, and surreal series about a group of people who survive when their commercial passenger jet, Oceanic Airlines Flight 815, crashes on a remote island in the tropical Pacific.'
            ],
            [
                'name' => 'Sex Education',
                'description' => 'A teenage boy with a sex therapist mother teams up with a high school classmate to set up an underground sex therapy clinic at school.'
            ]
        ];

        foreach ($series as $serie) {
            Series::create([
                'name' => $serie['name'],
                'description' => $serie['description']
            ]);
        }
    }
}

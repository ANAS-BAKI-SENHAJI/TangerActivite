<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = [
            [
                'name' => "paintball",
                'price' => 200.10,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.',
                'activity_date' => "2021-05-29",
                'activity_time' => "20:00:00",
                'duration_of_activity' => "100sec",
                'min_number_of_people' => "2 personne",
                'max_number_of_people' => "4 personne",
                'included_equipment' => "non",
                'included_transport' => "oui",
                'equipments_included' => "Pas d'equipment inclus",
                'image' => 'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/mens-better-than-naked-jacket-AVMH_LC9_hero.png',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ]
            ];
    }
}

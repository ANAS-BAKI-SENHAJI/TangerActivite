<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use DateTime;


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
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
                'duration_of_activity' => "100sec",
                'min_number_of_people' => 2,
                'max_number_of_people' => 4,
                'included_equipment' => "non",
                'included_transport' => "oui",
                'equipments_included' => "Pas d'equipment inclus",
                'image' => 'logo.jpg',
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
            ];

            DB::table('activities')->insert($activities);
    }
}

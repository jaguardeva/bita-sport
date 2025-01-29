<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $facilities = [
            ["name" => "shower"],
            ["name" => "toilet"],
            ["name" => "parkir motor"],
            ["name" => "parkir mobil"],
            ["name" => "ruang ganti"],
        ];

        foreach ($facilities as $facility) {
            Facility::create($facility);
        }
    }
}

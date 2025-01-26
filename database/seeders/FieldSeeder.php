<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Field;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Field::updateOrCreate(
            [
                'name' => 'Lapangan Badminton 1',
            ],
            [
                'name' => 'Lapangan Badminton 1',
                'description' => 'Lapangan Badminton 1',
                'price' => 25000,
                'type' => 'badminton',
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
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

        $badminton = Category::where("name", "badminton")->first();
        $futsal = Category::where("name", "futsal")->first();

        Field::updateOrCreate(
            [
                'name' => 'Lapangan Badminton 1',
            ],
            [
                'name' => 'Lapangan Badminton 1',
                'description' => 'Lapangan Badminton 1',
                'image' => "https://storage.googleapis.com/data.ayo.co.id/photos/77445/SEO%20HDI%202/16.%20Kelebihan%20dan%20Kekurangan%20Lapangan%20Badminton%20Sintetis%20yang%20Perlu%20Diketahui.jpg",
                'price' => 25000,
                'category_uuid' => $badminton->uuid,
            ]
        );

        Field::updateOrCreate(
            [
                'name' => 'Lapangan Futsal Sintetis',
            ],
            [
                'name' => 'Lapangan Futsal Sintetis',
                'description' => 'Lapangan futsal dengan rumput sintetis berkualitas',
                'image' => 'https://centroflor.id/wp-content/uploads/2023/10/Rumput-Lapangan-Futsal.jpg',
                'price' => 75000,
                'category_uuid' => $futsal->uuid,
            ]
        );
    }
}

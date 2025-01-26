<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'ratting' => 4,
                'comment' => 'Lapangan sangat bagus',
                'user_uuid' => '9e0fc2e8-ad8f-49af-ad6f-72b109f6b375',
                'field_uuid' => '9e103c9e-1094-4a5c-8d42-ebea4f8b0926',
            ],
            [
                'ratting' => 5,
                'comment' => 'Lapangan sangat bagus',
                'user_uuid' => '9e0f77fd-40f2-4611-adda-6c2f3b818dfb',
                'field_uuid' => '9e103c9e-1094-4a5c-8d42-ebea4f8b0926',
            ]
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}

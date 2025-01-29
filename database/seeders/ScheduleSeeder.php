<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $field = Field::all();

        // Daftar jam operasional (08:00 - 22:00)
        $startHour = 8; // 08:00
        $endHour = 22;  // 22:00

        $schedules = [];

        foreach ($field as $fieldId) {
            for ($hour = $startHour; $hour < $endHour; $hour++) {
                $schedules[] = [
                    'uuid' => Str::uuid(),
                    'field_uuid' => $fieldId->uuid,
                    'start_time' => sprintf('%02d:00:00', $hour), // Format HH:00:00
                    'end_time' => sprintf('%02d:00:00', $hour + 1), // Format HH:00:00
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert ke database
        DB::table('schedules')->insert($schedules);
    }
}

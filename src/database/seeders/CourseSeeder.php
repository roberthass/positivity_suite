<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $now = new \DateTime();
        for ($i = 1; $i < 4; $i++) {
            DB::table('courses')->insert([
                'name' => "Test Kurs " . $i,
                'created_at' => $now->format('Y-m-d H:i:s'),
                'updated_at' => $now->format('Y-m-d H:i:s'),
            ]);
        }
    }
}

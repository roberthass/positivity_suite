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
        $j = 1;

        $users = DB::table('users')
            ->select('id')
            ->get();

        foreach ($users as $userId) {
            for ($i = 1; $i < 4; $i++) {
                DB::table('courses')->insert([
                    'name' => "Test Kurs " . $j,
                    'user_id' => $userId->id,
                    'created_at' => $now->format('Y-m-d H:i:s'),
                    'updated_at' => $now->format('Y-m-d H:i:s'),
                ]);

                $j++;
            }
        }


    }
}

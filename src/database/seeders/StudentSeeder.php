<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    private function getRandomUser() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $contents = curl_exec($ch);

        return json_decode($contents, true)['results'][0];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            $now = new \DateTime();
            $randomUser = $this->getRandomUser();

            $studentId = DB::table('students')->insertGetId([
                'first_name' => $randomUser['name']['first'],
                'given_name' => $randomUser['name']['last'],
                'photo_url' => $randomUser['picture']['large'],
                'last_praise' => $now->modify('-' . rand ( 1 , 10 )  . ' hours')->format("Y-m-d H:i"),
                'praise_count' => rand ( 10 , 25 ),
                'created_at' => $now->format('Y-m-d H:i:s'),
                'updated_at' => $now->format('Y-m-d H:i:s'),
            ]);

            DB::table('student_course')->insert([
                'student_id' => $studentId,
                'course_id' => 1,
            ]);
        }


    }
}

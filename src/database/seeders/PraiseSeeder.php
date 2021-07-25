<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PraiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new \DateTime();

        $studentTeacherCombis = DB::select('
            select sc.student_id, u.id as teacher_id, s.praise_count, s.last_praise
            from student_course as sc 
                join courses as c on sc.course_id=c.id
                join users as u on c.user_id=u.id
                left join students as s on sc.student_id=s.id
        ');

        foreach($studentTeacherCombis as $studentTeacherCombi) {
            
            $somePraises = $studentTeacherCombi->praise_count;

            for($count = 0; $count <= $somePraises; $count++) {
                DB::table('praises')->insert([
                    'student_id' => $studentTeacherCombi->student_id,
                    'teacher_id' => $studentTeacherCombi->teacher_id,
                    'created_at' => $studentTeacherCombi->last_praise,
                    'updated_at' => $studentTeacherCombi->last_praise,
                ]);
            }            
        }

    }
}

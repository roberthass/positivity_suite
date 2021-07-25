<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function getStudents(Request $request) {

        $helper = array();

        $topToPraise = $request->query('toptopraise');

        if (isset($topToPraise)) {
            $limit = ($topToPraise == 0) ? 200 : $topToPraise;
        } else {
            $limit = 200;
        }

        $results = DB::select("SELECT * FROM student_course WHERE course_id=". $request->query('course') );

        foreach($results as $result) {
            $students = Student::where('id', $result->student_id)->get();
            foreach($students as $student) {
                $praises = DB::select('select count(student_id) as count_praises, max(updated_at) as last_praise from praises where student_id=?', [$student->id]);
                $helper[] = array(
                    'id' => $student->id,
                    'firstName' => $student->first_name,
                    'givenName' => $student->given_name,
                    'photoUrl' => $student->photo_url,
                    'lastPraise' => $praises[0]->last_praise,
                    'praise_count' => $praises[0]->count_praises
                );
            }
        }

        usort( $helper, 
                function($a,$b) { 
                    if ($a['praise_count'] == $b['praise_count']) {
                        return 0;
                    }
                    return ($a['praise_count'] < $b['praise_count'] ? -1 : 1 );
                } 
        );

        $limit = ($limit > count($helper)) ? count($helper) : $limit;
        for($count = 0; $count < $limit; $count++) {
            $helper2[] = $helper[$count];
        }
        return array("students" => $helper2);
    }

    public function getPraiseStudent(Request $request) {

        $now = new \DateTime();

        $result = array();

        $teacher = $request->query('teacherId');
        $student = $request->query('studentId');

        DB::table('praises')->insert([
            'student_id' => $student,
            'teacher_id' => $teacher,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        return $result;

    }
}

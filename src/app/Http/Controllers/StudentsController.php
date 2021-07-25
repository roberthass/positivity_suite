<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function getStudents(Request $request) {

        $helper = array();

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
        return array("students" => $helper);
    }

    public function postPraiseStudent(Request $request) {

        $now = new \DateTime();

        $result = array( );

        $teacher = $request->post('teacherId');
        $student = $request->post('studentId');

        DB::table('praises')->insert([
            'student_id' => $student,
            'teacher_id' => $teacher,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        return $result;

    }
}

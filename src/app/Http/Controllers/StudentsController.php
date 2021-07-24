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
                $helper[] = array(
                    'id' => $student->id,
                    'firstName' => $student->first_name,
                    'givenName' => $student->given_name,
                    'photoUrl' => $student->photo_url,
                    'lastPraise' => $student->last_praise,
                    'praise_count' => $student->praise_count
                );
            }
        }
        return array("students" => $helper);
    }

    public function postPraiseStudent() {

        $now = new \DateTime();

        $student =  array(
            "id" => 2,
            "firstNane" => "Jessie",
            "givenName" => "Robertson",
            "photoUrl" => "https://randomuser.me/api/portraits/men/79.jpg",
            "lastPraise" => $now->format("Y-m-d H:i"),
            "praiseCount" => 18
        );
        return $student;

    }
}

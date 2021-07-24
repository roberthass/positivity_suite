<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function getCourses(Request $request) {

        $helper = array();

        $results = Course::where('user_id', $request->query('lehrer'))->get();

        foreach ($results as $course) {
            $helper[] = array("id" => $course->id, "name" => $course->name);
        }

        return array("courses" => $helper);
    }
}

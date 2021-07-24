<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CoursesController extends Controller
{
    public function getCourses() {

        $helper = array();

        foreach (Course::all() as $course) {
            $helper[] = array("id" => $course->id, "name" => $course->name);
        }

        return array("courses" => $helper);
    }
}

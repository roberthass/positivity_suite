<?php

namespace App\Http\Controllers;

class CoursesController extends Controller
{
    public function getCourses() {

        $courses = array("courses" => array(array("id" => 1, "name" => "Test Kurs 1"), array("id" => 2, "name" => "Test Kurs 2")));

        return $courses;
    }
}

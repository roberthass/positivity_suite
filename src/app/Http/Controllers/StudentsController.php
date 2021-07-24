<?php

namespace App\Http\Controllers;

class StudentsController extends Controller
{
    public function getStudents() {

        $now = new \DateTime();
        $students = array(
            array(
                "id" => 1,
                "firstNane" => "Gina",
                "givenName" => "Duncan",
                "photoUrl" => "https://randomuser.me/api/portraits/women/65.jpg",
                "lastPraise" => $now->modify('-2 hours')->format("Y-m-d H:i"),
                "praiseCount" => 24
            ),
            array(
                "id" => 2,
                "firstNane" => "Jessie",
                "givenName" => "Robertson",
                "photoUrl" => "https://randomuser.me/api/portraits/men/79.jpg",
                "lastPraise" => $now->modify('-5 hours')->format("Y-m-d H:i"),
                "praiseCount" => 18
            )
        );
        return array("students" => $students);
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

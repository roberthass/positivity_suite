<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/courses', function () {
    return json_encode(array("courses" => array(array("id" => 1, "name" => "Test Kurs 1"), array("id" => 2, "name" => "Test Kurs 2"))));
});

$router->get('/students', function () {
    $now = new \DateTime();
    $students = array(
        array(
            "id" => 1,
            "firstNane" => "Gina",
            "givenName" => "Duncan",
            "photoUrl" => "https://randomuser.me/api/portraits/women/65.jpg",
            "lastPraise" => $now->format("Y-m-d H:i"),
            "praiseCount" => 24
        ),
        array(
            "id" => 2,
            "firstNane" => "Jessie",
            "givenName" => "Robertson",
            "photoUrl" => "https://randomuser.me/api/portraits/men/79.jpg",
            "lastPraise" => $now->format("Y-m-d H:i"),
            "praiseCount" => 18
        )
    );
    return json_encode(array("students" => $students));
});

$router->post('/praise', function () {
    $now = new \DateTime();

    $student =  array(
        "id" => 2,
        "firstNane" => "Jessie",
        "givenName" => "Robertson",
        "photoUrl" => "https://randomuser.me/api/portraits/men/79.jpg",
        "lastPraise" => $now->format("Y-m-d H:i"),
        "praiseCount" => 18
    );
    return json_encode($student);
});

$router->get('/translations', function () {
    return json_encode(array("translations" => array(array("id" => 1, "text" => "text 1 release test", "score" => 0.98))));
});

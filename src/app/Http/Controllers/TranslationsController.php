<?php

namespace App\Http\Controllers;

class TranslationsController extends Controller
{
    public function getTranslations() {

        return array("translations" => array(array("id" => 1, "text" => "text 1", "score" => 0.98)));
    }
}

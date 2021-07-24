<?php

namespace App\Http\Controllers;

use App\Models\Translations;
use Illuminate\Http\Request;

class TranslationsController extends Controller
{
    public function getTranslations(Request $request) {

        $helper = array();

        $search =  $request->query('search');

        $results = Translations::where('keyword', 'like', '%' . $search . '%')->get();

        foreach ($results as $translation) {
            $helper[] = array(
                "id"     => $translation->id, 
                "text"   => $translation->text, 
                "score"  => 1-round(rand(0, 10)/100,2)
            );
        }

        $helper[] = array(
            "id"    => 123, 
            "text"  => "geht so", 
            "score" => 1-round(rand(0, 10)/100,2),
            "bla"   => '%' . $search . '%'
        );

        return array("translations" => $helper);
    }
}

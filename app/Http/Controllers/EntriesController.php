<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MattDaneshvar\Survey\Models\Survey;
use MattDaneshvar\Survey\Models\Entry;

class EntriesController extends Controller
{
    public function create($id){
        $survey = $this->survey($id);

        return view('welcome', compact('survey'));

    }


    public function store(Request $request){

        //return $request;
        $survey = $this->survey($request['survey_id']);
        //return $survey;
        $answers = $this->validate($request, $survey->rules);

        (new Entry)->for($survey)->fromArray($answers)->push();

        return back()->with('success', 'Gracias por su participacion!');
    }

    protected function survey($id){
        return Survey::where('id', $id)->first();
    }
}

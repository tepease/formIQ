<?php

namespace App\Http\Controllers;

use App\Form;
use App\Question;

class FormController extends Controller
{
    function __construct()
    {
        $this->middleware('auth.basic', ['only' => 'store']);
    }

    public function store()
    {
        $form = Form::create(request()->all());

        foreach (json_decode(request()->questions) as $key => $question) {
            Question::create([
                'form_id' => $form->id,
                'sequence' => $key,
                'type' => $question->type,
                'attr' => json_encode($question->attr),
                'updated_by' => 0
            ]);
        }

        return response()->json([
            'data' => $form->toArray()
        ], 200);
    }

    public function show($id)
    {
        $form = Form::findOrFail($id);

        return response()->json([
            'data' => $form->toArray()
        ], 200);
    }

    public function update($id)
    {
        $form = Form::findOrFail($id);
        $form->update(request()->all());

        return response()->json([
            'data' => $form->toArray()
        ], 200);
    }

    public function delete($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();

        return response()->json([], 204);
    }

    public function create()
    {
        return Form::schema();
    }
}

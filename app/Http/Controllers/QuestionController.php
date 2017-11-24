<?php

namespace App\Http\Controllers;

use App\Form;
use App\Question;

class QuestionController extends Controller
{
    public function store($id)
    {
        return response()->json(
            Question::create([
                'form_id' => $id,
                'type' => request()->type,
                'attr' => request()->attr,
                'sequence' => request()->sequence,
                'updated_by' => 0
            ]), 200);
    }

    public function index($id)
    {
        $questions = Form::findOrFail($id)->questions;

        return response()->json([
            'data' => $questions->all()
        ], 200);
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);

        return response()->json([
            'data' => $question->toArray()
        ], 200);
    }

    public function update($id)
    {
        $question = Question::findOrFail($id);
        $question->update(request()->all());

        return response()->json([
            'data' => $question->toArray()
        ], 200);
    }

    public function delete($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return response()->json([], 204);
    }

    public function create()
    {
        return Question::schema();
    }

    public function schema()
    {
        return Question::contentSchema();
    }
}

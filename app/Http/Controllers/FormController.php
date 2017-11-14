<?php

namespace App\Http\Controllers;

use App\Form;

class FormController extends Controller
{
    function __construct()
    {
        $this->middleware('auth.basic', ['only' => 'store']);
    }

    public function store()
    {
        return Form::create(request()->all());
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
        return response()->json([
            'data' => [
                'anonymous' => 'boolean'
            ]
        ], 200);
    }
}

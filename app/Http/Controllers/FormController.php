<?php

namespace App\Http\Controllers;

use App\Form;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class FormController extends Controller
{
    /*
     * @var RepositoryInterface
     *
     * TODO build out FormRepositoryEloquent
     */
    protected $repository;

    public function __construct($formRepository)
    {
        $this->repository = $formRepository;
    }

    public function store($request)
    {
        return $this->respondWithCreated(
            $this->repository->create($request->all())
        );
    }

    public function show($id)
    {

    }

    public function update()
    {

    }
}

<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {

    }

    public function store()
    {
        request()->password = Hash::make(request()->password);
        return User::create(request()->all());
    }

    public function update()
    {

    }
}

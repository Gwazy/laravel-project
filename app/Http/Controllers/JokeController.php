<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Dog;

class JokeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Dog $j)
    {
        return view('dog.getDog', ['dog' => $j->getDogName()]);
    }
}

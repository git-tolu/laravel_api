<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class personController extends Controller
{
    //

    public function index()
    {
        $persons = Person::all();
        return response()->json($persons) 
    }
}

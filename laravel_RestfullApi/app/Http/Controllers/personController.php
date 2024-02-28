<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class personController extends Controller
{
    //

    // show all
    public function index()
    {
        $persons = Person::all();
        return response()->json($persons);
    }


    //post
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'firstname' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',

        ]);

        // Create a new Post instance with the validated data
        $post = new Person([
            'firstname' => $validatedData['firstname'],
            'last_name' => $validatedData['last_name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'city' => $validatedData['city'],
        ]);

        $post->save(); // Save the new post to the database

        return response()->json($post, 201); // Return the new post as JSON
    }

    // show one 
    public function show($id)
    {
        $persons = Person::find($id);
        if($persons){
            return response()->json([$persons], 202);
        }else{
            return response()->json([
                'message' => "Book not found"
            ], 404);
        }


    }

    public function update(Request $request,$id)
    {
        
        if(Person::where('id', $id)->exists()){
            $person = Person::find($id);
            $person->firstname = is_null($request->firstname) ? $person->firstname :  $request->firstname;
            $person->last_name = is_null($request->last_name) ? $person->last_name :  $request->last_name;
            $person->phone = is_null($request->phone) ? $person->phone :  $request->phone;
            $person->email = is_null($request->email) ? $person->email :  $request->email;
            $person->city = is_null($request->city) ? $person->city :  $request->city;
            $person->save();
            return response()->json([
                "message" => "Person Updated"
            ], 200);
        }else{
            return response()->json([
                "message" => "Person not found"
            ], 404);

        }
    }
    //delete
    public function destroy($id)
    {
        $post = Person::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->delete();
        return response()->json(['message' => 'Post deleted'], 202);
    }
}

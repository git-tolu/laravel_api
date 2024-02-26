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
        return response()->json($persons);
    }
    //post
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new Post instance with the validated data
        $post = new Person([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        $post->save(); // Save the new post to the database

        return response()->json($post, 201); // Return the new post as JSON
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

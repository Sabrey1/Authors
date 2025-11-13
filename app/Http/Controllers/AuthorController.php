<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $authors = Author::paginate(10);
        return view('Author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Author.CreateAuthor');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $author = new Author();
        $author->name = $request->name;
        $author->email = $request->email;
        $author->phone = $request->phone;
        $author->website = $request->website;
        $author->biography = $request->biography;
        $author->birth_date = $request->birth_date;
        $author->country = $request->country;
        $author->save();

        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author, $id)
    {
        $author = Author::find($id);
        return view('Author.ShowAuthor', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
{
    $author = Author::find($id);

    if (!$author) {
        abort(404, 'Author not found');
    }

    return view('Author.EditAuthor', compact('author'));
}

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return redirect()->route('authors.index')
                             ->with('error', 'Author not found.');
        }

        // Validate inputs
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'website'    => 'nullable|url|max:255',
            'phone'      => 'nullable|string|max:20',
            'biography'  => 'nullable|string|max:1000',
            'birth_date' => 'nullable|date',
            'country'    => 'nullable|string|max:100',
        ]);

        // Update only allowed fields
        $author->update($request->only([
            'name',
            'email',
            'website',
            'phone',
            'biography',
            'birth_date',
            'country'
        ]));

        return redirect()->route('authors.index')
                         ->with('success', 'Author updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author,$id)
    {
        $author = Author::find($id);
        if(!$author){
            return response()->json([
                'seccess' => false,
                'message' => 'Author not found',
                'author' => $author
            ]);
        }
        else{
            $author->delete();
            return redirect()->route('authors.index');
        }
    }
}

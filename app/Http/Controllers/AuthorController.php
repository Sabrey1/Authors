<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Author::query();

    // Check if search input exists
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;

        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }
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
        return redirect()->back()->withErrors(['error' => 'Author not found']);
    }
    else{
        $author->update($request->all());
        return redirect()
        ->route('authors.index')
        ->with('success', 'Author updated successfully');
    } 
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

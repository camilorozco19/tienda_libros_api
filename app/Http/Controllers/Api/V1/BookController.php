<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\LiteraryGenre;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    public function show($id)
    {
        // Incluimos las relaciones "category", "genres" y "authors"
        $book = Book::with('category', 'genres', 'authors')->find($id);
        return new BookResource($book);
    }

    public function create()
    {
        $categories = Category::all();
        $literaryGenres = LiteraryGenre::all();
        $authors = Author::all();

        return view('books.create', compact('categories', 'literaryGenres', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'genres' => 'required|array',
            'genres.*' => 'exists:literary_genres,id',
            'authors' => 'required|array',
            'authors.*' => 'exists:authors,id',
        ]);

        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        $book->genres()->attach($request->genres);
        $book->authors()->attach($request->authors);

        return redirect()->route('books.show', $book->id)->with('success', 'Book created successfully.');
    }

    public function edit($id)
    {
        $book = Book::with('genres', 'authors')->find($id);
        $categories = Category::all();
        $literaryGenres = LiteraryGenre::all();
        $authors = Author::all();

        return view('books.edit', compact('book', 'categories', 'literaryGenres', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'genres' => 'required|array',
            'genres.*' => 'exists:literary_genres,id',
            'authors' => 'required|array',
            'authors.*' => 'exists:authors,id',
        ]);

        $book = Book::find($id);

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        $book->genres()->sync($request->genres);
        $book->authors()->sync($request->authors);

        return redirect()->route('books.show', $book->id)->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}

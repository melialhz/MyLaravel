<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BookController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Books::find($id);
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
        ]);

        $book = new Books();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year = $request->year;
        $book->genre = $request->genre;
        $book->save();

        return redirect('/books');
    }

    public function edit($id)
    {
        $book = Books::find($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
        ]);

        $book = Books::find($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year = $request->year;
        $book->genre = $request->genre;
        $book->save();

        return redirect('/books');
    }

    public function destroy($id)
    {
        $book = Books::find($id);
        $book->delete();
        return redirect('/books');
    }
}

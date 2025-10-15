<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Public index - for all users with search
    public function index(Request $request)
    {
        $search = $request->get('search');

        $books = Book::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('books.index', compact('books', 'search'));
    }

    // Show single book detail
    public function show($id)
    {
        $book = Book::findOrFail($id);

        // Get other books by same author
        $booksByAuthor = Book::where('author', $book->author)
            ->where('id', '!=', $book->id)
            ->limit(6)
            ->get();

        // Get other books by same publisher
        $booksByPublisher = Book::where('publisher', $book->publisher)
            ->where('id', '!=', $book->id)
            ->limit(6)
            ->get();

        return view('books.show', compact('book', 'booksByAuthor', 'booksByPublisher'));
    }

    // Admin only - Create form
    public function create()
    {
        return view('books.create');
    }

    // Admin only - Store new book
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Book::create([
            'name' => $request->name,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'price' => $request->price,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'image' => $imageName,
            'description' => $request->description
        ]);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }
}

<?php

namespace App\Http\Controllers;


use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
//        dd($books);
        return view('admin.book.list',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.book.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Book $book,BookRequest $request)
    {
        if (!$request->hasFile('image')){
            $path = 'images/TQre7t4anpTxVhi2rYqYocxGLCOpD8NqU7zEIxkg.jpg';
        }else{
            $path = $request->file('image')->store('images','public');
        }
        $book->name = $request->name;
        $book->category_id = $request->category;
        $book->price = $request->price;
        $book->image = $path;
        $book->description = $request->description;
        $book->save();
        return redirect()->route('book.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('admin.book.update',compact('categories','book'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, book $book, $id)
    {
//        dd($request->image);
        if (!$request->hasFile('image')){
            $book = Book::findOrFail($id);
            $path = $book->image;
        }else{
            $path = $request->file('image')->store('images','public');
        }
        $book->name = $request->name;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->category_id = $request->category;
        $book->image = $path;
        $book->save();
        return redirect()->route('book.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book =Book::findOrFail($id);
        $book->delete();
        return redirect()->route('book.list');

    }
}

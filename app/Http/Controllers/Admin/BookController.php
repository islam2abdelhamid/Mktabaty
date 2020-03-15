<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Validation\Rule;
use App\Book;
use App\Category;
use SebastianBergmann\Environment\Console;

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
        $categories = Category::all();

        return view('dashboard.pages.books.index', ['books' => $books, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('addBook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);


        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->price = $request->price;
        $book->quantity = $request->quantity;
        $book->available = $request->quantity;
        $book->image = $imageName;
        $book->save();

        return back()->with('message', 'Book added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $book = Book::find($id);
        return view('dashboard.pages.books.edit-book', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        print_r($book);
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg',
        ]);


        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->price = $request->price;
        $book->quantity = $request->quantity;
        $book->available = $request->quantity;


        if (request()->image != null) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $book->image = $imageName;
        }
        $book->save();
        return back()->with('message', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('books')
            ->where('id', '=', $id)
            ->delete();

        return back()->with('message', 'Book deleted successfully');
    }
}

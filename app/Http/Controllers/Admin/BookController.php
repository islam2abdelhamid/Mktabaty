<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Validation\Rule;
use App\Book;
use App\Category;
use Illuminate\Support\Facades\Auth;
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
            'description' => 'required',
            'author' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);


        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $book = new Book;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->category_id = $request->category;
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
        $book = Book::find($id);
        return view('mktabaty.pages.books.book', ['book' => $book]);
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

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg',
        ]);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category;
        $book->price = $request->price;
        $book->quantity = $request->quantity;
        $book->available = $request->avaliable;


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


    public function categoryBooks($category_id)
    {


        $category =  Category::find($category_id);
        $books = $category->books()->get();
        $bookCategories = Category::all();

        return view('mktabaty.pages.books.Categoriesbooks', compact('books', 'bookCategories', 'category'));
    }

    public function webBooks()
    {
        $active = null;

        $bookCategories = Category::all();

        $category  = Category::orderBy('created_at', 'asc')->first();

        if (isset($category)) {
            $active = $category->id;
        }
        // $books = Book::orderBy('id', 'desc')->where('category_id', $active)->paginate(3);
        $books = Book::all();
        $rates = DB::table('comments')->select(DB::raw('avg(rate)as avg,book_id,comment'))
        ->where('rate', '!=', 0)
        ->groupBy('book_id','comment')->get();

        return view('mktabaty/pages/books/index', compact('bookCategories', 'books', 'active','rates'));
    }

    public function search(Request $request){

        if ($request->selectButton == "title") {
            $books = Book::query()
                    ->where('title', 'LIKE', "%{$request->searchButton}%")
                    ->get();
        }else if ($request->selectButton == "author") {
            $books = Book::query()
                    ->where('author', 'LIKE', "%{$request->searchButton}%")
                    ->get();
        }else {
            $books = Book::all();
        }
        return $this->webBooks()->with('books', $books);
    }
}

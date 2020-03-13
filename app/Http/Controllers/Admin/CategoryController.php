<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $categories=Category::all();
        return view('dashboard.pages.books')->with('categories', $categories)->with('books', $books);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData=  $request->validate([
            'name'=>'required|max:255|unique:categories|string'
        ]);


    $category=Category::create($validatedData);

    return redirect('/admin/cat')->with('sucess','Category is successfully saved');
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

        //will retrieve the first result of the query; however, if no result is found;
        // $category= Category::findOrFail($id);

        $category = Category::findOrNew($id);
        $category->fill($request->all());
        $category->save();
        return view('dashboard.pages.books', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validatedData=  $request->validate([
            'name'=>'required|max:255|unique:categories|string'
        ]);


        Category::whereId($id)->update($validatedData);

        return redirect('/admin/cat')->with('success', 'Category is successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::findOrFail($id);
        $category->delete();

        return  redirect('/admin/cat')->with('success', 'Category is successfully deleted');
    }
}

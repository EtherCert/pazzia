<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    /**-
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return __METHOD__;
        $categories = Category::simplePaginate(6);
        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
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
            'name' => 'required|min:2|max:20'
        ]);
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
        return redirect(route('admin.categories'))->with('message_flash', sprintf('Category "%s" Added!', $category->name));
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
        //
        $category = Category::findorFail($id);
        return view('admin.categories.edit')->with('category', $category);
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
        $request->validate([
            'name' => 'required|min:2|max:20'
        ]);
        $category = Category::findorFail($id);
        $category->name = $request->input('name');
        $category->save();
        return redirect(route('admin.categories'))->with('message_flash', sprintf('Category "%s" Updated!', $category->name));
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
        /* $category = Category::findorFail($id);
        $category->delete(); */
        $category = Category::findOrFail($id);
        $category->delete($id);
        return redirect(route('admin.categories'))->with('message_flash', sprintf('Category "%s" Deleted!', $category->name));
    }
    public function posts($id)
    {
        $category = Category::findOrFail($id);
        $catname = $category->name;

        $posts = $category->posts;
        return view('posts.categories', [
            'posts' => $posts,
            'catname' => $catname,

        ]);
    }
}

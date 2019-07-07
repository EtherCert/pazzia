<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return __METHOD__;
        $tags = Tag::simplePaginate(6);
        return view('admin.tags.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tags.create');
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
        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->save();
        return redirect(route('admin.tags'))->with('message_flash', sprintf('Tag "%s" Added!', $tag->name));
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
        $tag = Tag::findorFail($id);
        return view('admin.tags.edit')->with('tag', $tag);
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
        $tag = Tag::findorFail($id);
        $tag->name = $request->input('name');
        $tag->save();
        return redirect(route('admin.tags'))->with('message_flash', sprintf('Tag "%s" Updated!', $tag->name));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id); //find with if
        $tag->delete();
        return redirect(route('admin.tags'))->with('message_flash', sprintf('Tag "%s" Deleted!', $tag->name));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\PostTag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'trashed']);
    }

    public function index()
    {
        //
        // return __METHOD__;
        //$posts = Post::all();
        //$posts = Post::withoutGlobalScope('published')->get();
        $title = request()->query('title', '');
        $status = request()->query('status', '');
        $category_id = request()->query('category_id');
        $posts = Post::withoutGlobalScope('published')
            ->with('category', 'stat')
            // ->select('posts.*', 'categories.name as category_name')
            // ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
            ->when($title, function ($query, $title) {
                return $query->where('title', 'LIKE', '%' . $title . '%');
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', '=', $status);
            })
            ->when($category_id, function ($query, $category_id) {
                return $query->where('category_id', '=', $category_id);
            })
            ->simplePaginate(6);

        // Post::withTrashed()
        // $posts = Post::onlyTrashed();
        return view('admin.posts.index')->with(
            [
                'posts' => $posts,
                'title' => $title,
                'status' => $status,
                'category_id' => $category_id

            ]

        );
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->simplePaginate(6);
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function restore($id)
    {
        // $post =Post::findorFail($id); // there is Not found
        // $post =Post::onlyTrashed()->findorFail($id); //or below
        $post = Post::onlyTrashed()->where('id', '=', $id)->first();
        $post->restore();
        return redirect(route('admin.posts'))->with('message_flash', sprintf('Post "%s" restore!', $post->title));
    }

    public function forceDelete($id)
    {
        // $post =Post::findorFail($id); // there is Not found
        // $post =Post::onlyTrashed()->findorFail($id); //or below
        $post = Post::onlyTrashed()->where('id', '=', $id)->first();
        $post->forceDelete();
        return redirect(route('admin.posts.trashed'))->with('message_flash', sprintf('Post "%s" Deleted!', $post->title));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Categories = Category::all();
        if (count($Categories) == 0) {
            return view('admin.categories.create');
        }
        return view('admin.posts.create')->with('Categories', $Categories);
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
        $request->validate([
            'title' => 'required|max:255|min:10',
            'content' => 'required',
            'category' => 'required',
            'image' => 'required|image',
            'status' => 'required'

        ]);

        $image = $request->file('image'); //get image name
        $path = $image->store('images', 'public'); // to get path of image from storage
        //the store method will generate a unique ID to serve as the file name. 
        //storeAs()


        /* $image = $request->file('image'); 
        //for change name
        $image_new = time().$image->getClientOriginalName();
        //to move it to posts folder
        $image->move('uploads/posts',$image_new); */

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image = $path;
        //  $post->image = 'uploads/posts/'.$image_new;
        $post->category_id = $request->input('category');
        $post->status = $request->input('status');
        $post->save();
        //        $post->tags()->sync('tags');

        $tags = $request->post('tag');
        foreach ($tags  as $tag_id) {
            PostTag::create([
                'post_id' => $post->id,
                'tag_id' => $tag_id
            ]);
        }
        return redirect(route('admin.posts'))->with('message_flash', sprintf('Post "%s" created!', $post->title));
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

        $post = Post::findOrFail($id); //find with if
        //$tags = PostTag::where('post_id', $post->id)->pluck('tag_id')->toArray();
        $Categories = Category::all();
        //return $post->tags;
        $tags =  $post->tags->pluck('id')->toArray();
        return view('admin.posts.edit')->with('post', $post)
            ->with('Categories', $Categories)
            ->with('tags', $tags);
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
            'title' => 'required|max:255|min:10',
            'content' => 'required',
            'category' => 'required',
            'status' => 'required',
            'image' => 'image' //not need to be required
        ]);
        $post = Post::findOrFail($id); //find with if
        // return view('admin.posts.edit')->with('post', $post);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $path = $image->store('images' , 'public');
            $path = $image->storeAs('images', basename($post->image), 'public');
            $post->image =  $path;
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category');
        $post->status = $request->input('status');
        $post->save();

        $tags = $request->post('tag');
        $post->tags()->sync($tags);

        //PostTag::where('post_id', $post->id)->delete(); 
        // foreach ($tags as $tag_id) {
        //     //DB::table('post_tag')->insert([ // or
        //     $postTag =  \App\PostTag::create([
        //         'post_id' => $post->id,
        //         'tag_id' => $tags->id
        //     ]);
        // }
        return redirect(route('admin.posts'))->with('message_flash', sprintf('Post "%s" Updated!', $post->title));
        // return __METHOD__;
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
        $post = Post::withoutGlobalScope('published')->findOrFail($id); //find with if
        $post->delete();
        //return __METHOD__;
        return redirect(route('admin.posts'))->with('message_flash', sprintf('Post "%s" deleted!', $post->title));
    }
}

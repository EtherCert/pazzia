<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\PostStat;
use App\Tag;
use App\Category;
use DB;
use App\Comment;

class PostsController extends Controller
{
    public function indexxxxx()
    {
        return 'All Posts here';
    }

    public function viewwwwww($id, $name = ' ')
    {
        return 'Post --' . $id . '-- here with name : ' . $name;
    }

    public function allPosts()
    {
        // dd($this->posts);
        //return view('posts.index')->with('posts', $this->posts);
        //  return view('posts.index')->with('posts', Post::all());

        /* return view('posts.index')->with([
             'posts' => $this->posts, 
    		 'title' => '<h5>tag</h5>', 
    		 'test' => 10,
        ]);  */
        //latest() = orderby('created_at', 'DESC')

        //$posts = Post::where('status', 'published')->latest()->get();
        //published() == local scope 
        $posts = Post::status()->paginate(6);
        return view('posts.index')->with('posts', $posts);
    }
    public function view($id)
    {
        //dd($this->posts[$id]);
        $title = request()->query('title', '');
        $post = Post::where('status', 'published')
            ->when($title, function ($query, $title) {
                return $query->where('title', 'LIKE', '%' . $title . '%');
            })->findOrFail($id);
        if (!$post) {             //!array_key_exists($id, $this->posts)
            abort(404);
        } else {
            PostStat::updateOrCreate([
                'post_id' => $post->id
            ], [
                'views' => DB::raw('views +1')
            ]);
            return view('posts.blogSingle')->with('post', $post);
        }
    }
    public function show()
    {
        //dd($this->posts[$id]);
        $title = request()->query('title', '');
        $posts = Post::where('status', 'published')
            ->when($title, function ($query, $title) {
                return $query->where('title', 'LIKE', '%' . $title . '%');
            })->get();
        if (!$posts) {             //!array_key_exists($id, $this->posts)
            abort(404);
        } else {
            return view('posts.search')->with('posts', $posts);
        }
    }
    public function contact()
    {
        return view('posts.contact');
    }
    public function services()
    {
        return view('posts.services');
    }

    public function tagPosts($id)
    {
        $tag = Tag::findOrFail($id);
        $post = $tag->posts;
        $tagname = $tag->name;
        return view('posts.tags')->with([
            'posts' => $post,
            'tagname' => $tagname
        ]);
    }

    public function publicposts($id)
    {
        $category = Category::findOrFail($id);
        $catname = $category->name;

        $posts = $category->posts;
        return view('posts.categories', [
            'posts' => $posts,
            'catname' => $catname,

        ]);
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|min:10',
            'email' => 'required| email',
            'message' => 'max:500|min:5',

        ]);
        $comment = new Comment();
        $comment->name = 'kbu';
        $comment->email = 'samia@gmail.com';
        $comment->message = 'hioh';
        $comment->post_id = '20';
        $comment->save();
        return redirect(route('posts' . $id))->with('message_flash', sprintf('Your comment "%s" added!', $comment->name));
    }
}

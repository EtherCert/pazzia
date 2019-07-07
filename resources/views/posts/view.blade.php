@extends('layout.default')
@section('title',$post['title'])

@section('content')
<article class="post">
    <header>
        <div class="title">
            <h2><a href="#}}">{{$post->title }}</a></h2>
            <p>{{$post->content}}</p>
        </div>
        <div class="meta">
            <time class="published" datetime="{{$post->created_at}}">{{$post->created_at}}</time>
            <a href="#" class="author"><span class="name">{{$post->category->name}}</span><img src="{{asset('storage/' . $post->image)}}" alt="" /></a>
        </div>
    </header>
    <a href="#" class="image featured"><img src="{{asset('storage/' . $post->image)}}" height="270" alt="" /></a>
    <p>{{$post->content}}</p>
    <footer>
        <ul class="actions">
            <li><a href="#" class="button large">Continue Reading</a></li>
        </ul>
        <ul class="stats">
            <li><a href="#">General</a></li>
            <li><a href="#" class="icon solid fa-heart">{{$post->stat->views}}</a></li>
            <li><a href="#" class="icon solid fa-comment">128</a></li>
        </ul>
    </footer>
</article>

@endsection

{{-- @component('component.alert')
@slot('type','danger')
<strong>Whoops!</strong> Something went wrong!    
@endcomponent --}}
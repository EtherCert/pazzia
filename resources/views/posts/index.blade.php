@extends('layout.default')
@section('title', 'All Posts!')
@section('slider-item', 'Home')
@section('content')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Read our blog</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
        <div class="row d-flex">

            @foreach ($posts as $post)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="{{route('posts.view',['id'=>$post->id,])}}" class="block-20" style="background-image: url('{{asset('storage/' . $post->image)}}')">
                    </a>
                    <div class=" text py-4 d-block">
                        <div class="meta">
                            <div>{{$post->created_at->format('M d, Y')}}</div>
                            <div>{{$post->category->name}}</a></div>
                            <div><span class="icon-eye"></span> {{$post->stat->views }}</div>
                        </div>
                        <h3 class="heading mt-2"><a href="{{route('posts.view',['id'=>$post->id,])}}">{{$post->title }}</a></h3>
                        <p>{{str_limit($post->content,120)}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- @foreach ($posts as $post)
<article class="post">
    <header>
        <div class="title">
            <h2><a href="{{route('posts.view',['id'=>$post->id,])}}">{{$post->title }}</a></h2>
            <p>{{$post->content}}</p>
        </div>
        <div class="meta">
            <time class="published" datetime="{{$post->created_at}}">{{$post->created_at->format('l, M d, Y h:i:s a')}}</time>
            <a href="#" class="author"><span class="name">{{$post->category->name}}</span><img src="{{asset('storage/' . $post->image)}}" alt="" /></a>
        </div>
    </header>
    <a href="single.html" class="image featured"><img src="{{asset('storage/' . $post->image)}}" height="300" alt="" /></a>
    <p>{{$post->content}}</p>
    <footer>
        <ul class="actions">
            <li><a href="{{route('posts.view',['id'=>$post->id,])}}" class="button large">Continue Reading</a></li>
        </ul>
        <ul class="stats">
            <li><a href="#">General</a></li>
            <li><a href="#" class="icon solid fa-heart">28</a></li>
            <li><a href="#" class="icon solid fa-comment">128</a></li>
        </ul>
    </footer>
    
</article>
@endforeach -->
{{$posts->links()}}
@endsection
@extends('layout.default')
@section('title', 'All posts for category - '.$catname .'-')
@section('slider-item', 'Category')
@section('content')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Posts For Tag {{$catname}}</h2>
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
@endsection
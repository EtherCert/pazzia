@extends('layout.default')
@section('title', $post->title)
@section('slider-item','Blog Details')
@section('content')
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ftco-animate">
                <h2 class="mb-3">{{$post->title}}</h2>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <div class=" text py-4 d-block">
                            <div class="meta">
                                <div><span class="icon-calendar"></span> {{$post->created_at->format('M d, Y')}}</div>
                                <div><span class="icon-list"></span> {{$post->category->name}}</div>
                                <div><span class="icon-eye"></span> {{$post->stat->views }}</div>

                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    //<![CDATA[
                    window.__mirage2 = {
                        petok: "0e3e9d6589aad18e2fdbe8e55be4b824fc1ea066-1562265518-14400"
                    };
                    //]]>
                </script>
                <script type="text/javascript" src="{{asset('assets/js/mirage2.min.js')}}"></script>
                <img data-cfsrc="{{asset('storage/'.$post->image)}}" alt="" class="img-fluid" style="display:none;visibility:hidden;"><noscript><img src="images/image_1.jpg" alt="" class="img-fluid"></noscript>
                <br>
                <p>{{$post->content}}.</p>

                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        @foreach($post->tags as $tag)
                        <a href="{{ route('tagposts',['id' => $tag->id ] )}}" class="tag-cloud-link">{{$tag->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="pt-5 mt-5">
                    <h3 class="mb-5">{{count($post->comments)}} Comments</h3>
                    <ul class="comment-list">
                        @foreach($post->comments as $comment)
                        <li class="comment">
                            <div class="vcard bio">
                                <img data-cfsrc="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder" style="display:none;visibility:hidden;"><noscript><img src="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder"></noscript>
                            </div>
                            <div class="comment-body">
                                <h3>{{$comment->name}}</h3>
                                <p>{{$comment->created_at->format('M d, Y, H:m A')}}</p>
                                <p>{{$comment->message}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        <form method="post" action="{{route('addcomment',['id'=>$post->id])}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 sidebar ftco-animate">
                <div class="sidebar-box">
                    <form method="get" class="search-form" action="{{route('posts.search')}}">
                        @csrf
                        <div class="form-group">
                            <div class="icon">
                                <span class="icon-search"></span>
                            </div>
                            <input type="text" class="form-control" name="title" placeholder="Seartch tilte">
                        </div>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Categories</h3>
                        @foreach (App\Category::all() as $category)
                        <li><a href="{{ route('categoryposts',['id' => $category->id ] )}}">{{$category->name}}<span>({{$category->posts->count()}})</span></a></li>
                        @endforeach
                    </div>
                </div>
                <div class="sidebar-box ftco-animate">
                    <h3>Tag Cloud</h3>
                    <div class="tagcloud">
                        @foreach (App\Tag::all() as $tag)
                        <a href="{{ route('tagposts',['id' => $tag->id ] )}}" class="tag-cloud-link">{{$tag->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="sidebar-box ftco-animate">
                    <h3>Paragraph</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
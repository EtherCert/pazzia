@extends('layout.default')
@section('title', 'Search Result')
@section('slider-item','Search Result')
@section('content')
<section class="ftco-section ftco-degree-bg">
    @if(count($posts)>0)
    @foreach($posts as $post)
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
                    <h3 class="mb-5">6 Comments</h3>
                    <ul class="comment-list">
                        <li class="comment">
                            <div class="vcard bio">
                                <img data-cfsrc="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder" style="display:none;visibility:hidden;"><noscript><img src="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder"></noscript>
                            </div>
                            <div class="comment-body">
                                <h3>John Doe</h3>
                                <div class="meta">June 27, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                            </div>
                        </li>
                        <li class="comment">
                            <div class="vcard bio">
                                <img data-cfsrc="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder" style="display:none;visibility:hidden;"><noscript><img src="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder"></noscript>
                            </div>
                            <div class="comment-body">
                                <h3>John Doe</h3>
                                <div class="meta">June 27, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                            </div>
                            <ul class="children">
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img data-cfsrc="{{asset('assets/images/person_1.jpg')
                                        }}" alt="Image placeholder" style="display:none;visibility:hidden;"><noscript><img src="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder"></noscript>
                                    </div>
                                    <div class="comment-body">
                                        <h3>John Doe</h3>
                                        <div class="meta">June 27, 2018 at 2:21pm</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                        <p><a href="#" class="reply">Reply</a></p>
                                    </div>
                                    <ul class="children">
                                        <li class="comment">
                                            <div class="vcard bio">
                                                <img data-cfsrc="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder" style="display:none;visibility:hidden;"><noscript><img src="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder"></noscript>
                                            </div>
                                            <div class="comment-body">
                                                <h3>John Doe</h3>
                                                <div class="meta">June 27, 2018 at 2:21pm</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                <p><a href="#" class="reply">Reply</a></p>
                                            </div>
                                            <ul class="children">
                                                <li class="comment">
                                                    <div class="vcard bio">
                                                        <img data-cfsrc="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder" style="display:none;visibility:hidden;"><noscript><img src="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder"></noscript>
                                                    </div>
                                                    <div class="comment-body">
                                                        <h3>John Doe</h3>
                                                        <div class="meta">June 27, 2018 at 2:21pm</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                        <p><a href="#" class="reply">Reply</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="comment">
                            <div class="vcard bio">
                                <img data-cfsrc="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder" style="display:none;visibility:hidden;"><noscript><img src="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder"></noscript>
                            </div>
                            <div class="comment-body">
                                <h3>John Doe</h3>
                                <div class="meta">June 27, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                            </div>
                        </li>
                    </ul>

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        <form action="#">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
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
    @endforeach
    @else
    <div class="container">
        <h5>No Results</h5>
    </div>
    @endif
</section>
@endsection
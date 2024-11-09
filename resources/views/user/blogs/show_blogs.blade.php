
@extends('user.layout.app')
@section('content')
<div class="inner-banner">
    <section class="w3l-breadcrumb py-5">
        <div class="container py-lg-5 py-md-3">
            <h2 class="title">Single post</h2>
        </div>
    </section>
</div>
<!-- banner bottom shape -->
<div class="position-relative">
    <div class="shape overflow-hidden">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- banner bottom shape -->
<div class="py-md-5 pt-5 pb-4 w3l-singleblock1">
    <div class="container mt-md-3">
        <h3 class="blog-desc-big">{{ $blog->name }}</h3>
        <div class="blog-post-align">
            <div class="entry-meta">
                <span class="comments-link"> <a href="#reply">Leave a Comment</a> </span> /
                <span class="cat-links"><a href="#url" rel="category tag">
                    @if (isset($blog->blogCategory))                                    
                        {{ $blog->blogCategory->name }}
                    @else
                        Uncategorized                                        
                    @endif                
                </a></span> /
                <span class="posted-on"><span class="published"> {{ $blog->created_at->format('M d, Y') }} </span></span>
            </div>
        </div>
    </div>
</div>

<section class="blog-post-main w3l-homeblock1">
    <!--/blog-post-->
    <div class="blog-content-inf pb-5">
        <div class="container pb-lg-4">
            <div class="single-post-image">
                <div class="post-content">
                    @if(isset($blog->image))
                        <img class="radius-image-full img-fluid mb-5" src="{{ asset("storage/".$blog->image) }}" alt="blog-image ">
                    @else
                        <img class="radius-image-full img-fluid mb-5" src="{{ asset("user_assets/images/blog-image.jpeg") }}" alt="blog-image ">
                    @endif
                </div>
            </div>
            <div class="single-post-content">
                {!!$blog->description!!}
                {{-- <div class="d-grid left-right mt-5 pb-md-5">
                    <div class="buttons-singles tags">
                        <h4>Tags :</h4>
                        <a href="#blog-tag">Child protection</a>
                        <a href="#blog-tag">Disaster Relief</a>
                    </div>
                    <div class="buttons-singles">
                        <h4>Share :</h4>
                        <a href="#blog-share"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                        <a href="#blog-share"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                        <a href="#blog-share"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                        <a href="#blog-share"><span class="fa fa-pinterest-p" aria-hidden=" true"></span></a>
                    </div>
                </div> --}}
                <nav class="navigation post-navigation my-4" role="navigation" aria-label="Posts">
                    <div class="nav-links">
                        <div class="nav-previous">
                            @if($prev_blog)
                                <a href="{{ route('blog.show', $prev_blog->slug) }}"  rel="prev"> <span class="ast-left-arrow">←</span> Previous Post</a>
                            @endif
                        </div>
                        <div class="nav-next text-right">
                            @if($next_blog)
                                <a  href="{{ route('blog.show', $next_blog->slug) }}" rel="next"> Next Post <span class="ast-right-arrow">→</span></a>
                            @endif
                        </div>
                    </div>
                </nav>

                <!--//author-card-->
                {{-- <div class="author-card mt-5">
                    <div class="row align-items-center">
                        <div class="author-left col-md-3">
                            <a href="#author">
                                <img class="img-fluid radius-image" src="assets/images/team1.jpg"
                                    alt=" author image">
                            </a>
                        </div>
                        <div class="col-md-9 mt-md-0 mt-4">
                            <h3 class="mb-3 title">Alexander Ronald</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, sed et excepturi.
                                Distinctio fugit odit? Fugit ipsam. Lorem ipsum dolor sit. Phasellus lacinia id,
                                sunt in
                                culpa quis.
                            </p>
                            <ul class="author-icons mt-4">
                                <li><a class="facebook" href="#url"><span class="fa fa-facebook"
                                            aria-hidden="true"></span></a> </li>
                                <li><a class="twitter" href="#url"><span class="fa fa-twitter"
                                            aria-hidden="true"></span></a></li>
                                <li><a class="linkedin" href="#url"><span class="fa fa-linkedin"
                                            aria-hidden="true"></span></a></li>
                                <li><a class="github" href="#url"><span class="fa fa-github"
                                            aria-hidden="true"></span></a>
                                </li>
                                <li><a class="dribbble" href="#url"><span class="fa fa-dribbble"
                                            aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <!--//author-card-->

                    @if ($blogComments->count() > 0) 

                    <div class="comments mt-5 pt-lg-4">
                        <h4 class="side-title ">Comments ({{ $blogComments->count() }})</h4>
                       
                        @foreach ($blogComments as $comment)
                            <div class="media">
                                <div class="img-circle">
                                    <img src="{{ asset("user_assets/images/user-icon.png") }}" class="img-fluid" alt="user-icon">
                                </div>
                                <div class="media-body">
                                    <ul class="time-rply mb-2">
                                        <li><a href="javascript:void(0)" class="name mt-0 mb-2 d-block">{{ $comment->name }}</a>
                                            {{ $comment->created_at->diffForHumans() }}
                                        </li>
                                        {{-- <li class="reply-last">
                                            <a href="#reply" class="reply">
                                                Reply</a>
                                        </li> --}}
                                    </ul>
                                    <p> {{ $comment->comment }}</p>
                                    {{-- <div class="media second mt-4 p-0 pt-2">
                                        <a class="img-circle img-circle-sm" href="#url">
                                            <img src="{{ asset("user_assets/images/user-icon.png") }}" class="img-fluid" alt="...">
                                        </a>
                                        <div class="media-body">
                                            <ul class="time-rply mb-2">
                                                <li><a href="#URL" class="name mt-0 mb-2 d-block">Jackson Wyatt</a>
                                                    August 19th, 2024 - 14:20 pm
        
                                                </li>
                                                <li class="reply-last">
                                                    <a href="#reply" class="reply"> Reply</a>
                                                </li>
                                            </ul>
                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                                corrupti quos dolores et. Lorem ipsum dolor sit amet......</p>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                        <nav class="navigation post-navigation my-4" role="navigation" aria-label="Posts">
                            <div class="nav-links">
                                <div class="nav-previous">
                                    @if($blogComments->previousPageUrl())
                                        <a href="{{ $blogComments->previousPageUrl() }}"  rel="prev"> <span class="ast-left-arrow">←</span> Previous Comments</a>
                                    @endif
                                </div>
                                <div class="nav-next text-right">
                                    @if($blogComments->hasMorePages())
                                        <a  href="{{ $blogComments->nextPageUrl() }}" rel="next"> Next Comments <span class="ast-right-arrow">→</span></a>
                                    @endif
                                </div>
                            </div>
                        </nav>                     
                    </div>

                    @endif

                <div class="leave-comment-form mt-5 pt-lg-4" id="reply">
                    <h4 class="side-title mb-2">Leave a reply</h4>
                    <p class="mb-4">Your email address will not be published. Required fields are marked *
                    </p>
                    <form action="{{route('blog.comment.store',Crypt::encrypt($blog->id))}}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="comment" class="form-control" placeholder="Your Comment*" required spellcheck="false">{{old('comment')}}</textarea>
                        </div>
                        <div class="input-grids row">

                            <div class="form-group col-lg-6">
                                <input type="text" name="name" class="form-control"
                                    placeholder="Your Name*" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" name="email" class="form-control" placeholder="Email*"
                                    required>
                            </div>
                        </div>

                        <div class="submit text-right">
                            <button type="submit" class="btn btn-style btn-primary">Post Comment </button>
                        </div>
                    </form>
                </div>

                <!-- related posts -->
                {{-- <div class="item mt-5 pt-lg-5">
                    <h3 class="section-title-left mb-4">Related posts for you </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="list-view list-view1">
                                <div class="grids5-info">
                                    <a href="blog-single.html" class="d-block zoom"><img
                                            src="assets/images/blog5.jpg" alt=""
                                            class="img-fluid radius-image news-image"></a>
                                    <div class="blog-info align-self">
                                        <a href="blog-single.html" class="blog-desc1">Request for an audience with
                                            First Lady Melania
                                        </a>
                                        <div class="entry-meta mb-3">
                                            <span class="cat-links"><a href="#url"
                                                    rel="category tag">Uncategorized</a></span> /
                                            <span class="posted-on"><span class="published"> August 18,
                                                    2024</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-md-0 mt-5">
                            <div class="list-view list-view1">
                                <div class="grids5-info">
                                    <a href="blog-single.html" class="d-block zoom"><img
                                            src="assets/images/blog6.jpg" alt=""
                                            class="img-fluid radius-image news-image"></a>
                                    <div class="blog-info align-self">
                                        <a href="blog-single.html" class="blog-desc1">Charity, Faith and hope,
                                            Help the poor, Help the Homeless</a>
                                        <div class="entry-meta mb-3">
                                            <span class="cat-links"><a href="#url"
                                                    rel="category tag">Uncategorized</a></span> /
                                            <span class="posted-on"><span class="published"> August 18,
                                                    2024</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- //related posts -->
            </div>
        </div>
        <!--//blog-post-->
    </div>
</section>
@endsection
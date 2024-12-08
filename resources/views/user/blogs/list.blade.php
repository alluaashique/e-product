@extends('user.layout.app')
@section('content')
    
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Blogs</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                <li class="breadcrumb-item active text-white">Blogs</li>
            </ol>
        </div>
        <!-- Single Page Header End -->
  
    <!-- banner bottom shape -->
    <section class="w3l-blogblock py-5">
        <div class="container pt-lg-4 pt-md-3">
            @foreach ($blogs as $blog )
                <div class="item mt-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ route('blog.show', $blog->slug) }}">
                                @if(isset($blog->image))
                                    <img class="card-img-bottom d-block radius-image-full" src="{{ asset("storage/".$blog->image) }}" alt="blog-image ">
                                @else
                                    <img class="card-img-bottom d-block radius-image-full" src="{{ asset("user_assets/images/blog-image.jpeg") }}" alt="blog-image ">
                                @endif
                            </a>
                        </div>
                        <div class="col-lg-6 blog-details align-self mt-lg-0 mt-4">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="blog-desc-big">
                                {{ $blog->name }}
                            </a>
                            <div class="entry-meta mb-3">
                                <span class="comments-link"> <a href="{{ route('blog.show', $blog->slug) }}#reply">Leave a Comment</a> </span> /
                                <span class="cat-links"><a href="{{ route('blog.show', $blog->slug) }}#url" rel="category tag">
                                    @if (isset($blog->blogCategory))                                    
                                        {{ $blog->blogCategory->name }}
                                    @else
                                        Uncategorized                                        
                                    @endif
                                </a></span> /
                                <span class="posted-on"><span class="published"> {{ $blog->created_at->format('M d, Y') }}</span></span>
                            </div>
                            <p>  {{ $blog->short_description }}</p>
                            <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-primary btn-style mt-4">Read More</a>
                        </div>
                    </div>
                </div>                
            @endforeach
           
            <!-- pagination -->
            {{ $blogs->links('user.layout.pagination') }}

        </div>
    </section>
@endsection
@extends('user.layout.app')
@section('content')

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Product</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                <li class="breadcrumb-item active text-white">Product</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="javascript:void(0);">
                                        <img data-url="{{ asset('storage/'.$product->image) }}" class="img-fluid rounded" alt="Image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3">{{$product->name}}</h4>
                                <p class="mb-3">Category: {{$product->category->name}}</p>
                                <h5 class="fw-bold mb-3">{{$product->price}} $</h5>
                                <div class="d-flex mb-4">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                                <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p>
                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Description</button>
                                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        {!! $product->description !!}
                                        <div class="px-2">
                                            <div class="row g-4">
                                                <div class="col-6">
                                                @php $i=1; @endphp
                                                @foreach ( $product->specification as $specs )
                                                    @foreach ( $specs->values as $val )
                                                        <div class="row @if($i % 2 == 0) bg-light @endif align-items-center text-center justify-content-center py-2">
                                                            <div class="col-6">
                                                                <p class="mb-0">{{$specs->specification}}</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0">{{$val->value}} @if($specs->is_quantity || $specs->is_weight)
                                                                    {{$project_units[$product->unit]}}  
                                                                    @endif</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                        @foreach ($productReviews as $review) 
                                         <div class="d-flex">
                                             <img data-url="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                             <div class="">
                                                 <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                                 <div class="d-flex justify-content-between">
                                                     <h5>{{$review->name}}</h5>
                                                     <div class="d-flex mb-3">
                                                         <i class="fa fa-star text-secondary"></i>
                                                         <i class="fa fa-star text-secondary"></i>
                                                         <i class="fa fa-star text-secondary"></i>
                                                         <i class="fa fa-star text-secondary"></i>
                                                         <i class="fa fa-star"></i>
                                                     </div>
                                                 </div>
                                                 <p>{{$review->review}} </p>
                                             </div>
                                         </div>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane" id="nav-vision" role="tabpanel">
                                        <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                            amet diam et eos labore. 3</p>
                                        <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                            Clita erat ipsum et lorem et sit</p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('product_review.store')}}" method="POST">
                                @csrf
                                <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="border-bottom rounded">
                                            <input type="hidden" name="product_uuid" value="{{$product->uuid}}" required>
                                            <input type="text" class="form-control border-0 me-4" placeholder="Your Name *" name="name" value="{{old("name")}}" required>
                                            @error("name") {{$message}} @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="border-bottom rounded">
                                            <input type="email" class="form-control border-0" placeholder="Your Email *" name="email" value="{{old("email")}}" required>
                                            @error("email") {{$message}} @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border-bottom rounded my-4">
                                            <textarea name="review" id="review" class="form-control border-0" cols="30" rows="8" placeholder="Your Review *" spellcheck="false">{{old("review")}}</textarea>
                                            @error("review") {{$message}} @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between py-3 mb-5">
                                            <div class="d-flex align-items-center">
                                                {{--
                                                <p class="mb-0 me-3">Please rate:</p>
                                                <div class="d-flex align-items-center" style="font-size: 12px;">
                                                    <i class="fa fa-star text-muted"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                --}}
                                            </div>
                                            <button type="submit" class="btn border border-secondary text-primary rounded-pill px-4 py-3">Post Comment</button>
                                            {{-- <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post Comment</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="row g-4 fruite">
                            <div class="col-lg-12">
                                <div class="input-group w-100 mx-auto d-flex mb-4">
                                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                                <div class="mb-4">
                                    <h4>Categories</h4>
                                    <ul class="list-unstyled fruite-categorie">

                                        @foreach($categories as $category)
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="#"><i class="fas fa-apple-alt me-2"></i>{{$category->name}}</a>
                                                <span>({{$category->activeProductCount()}})</span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h4 class="mb-4">Featured products</h4>
                               @foreach ($featured_products as $product) 
                                 <div class="d-flex align-items-center justify-content-start">
                                    <a href="{{route('product.show',$product->uuid)}}">
                                     <div class="rounded" style="width: 100px; height: 100px;">
                                         <img data-url="{{ asset('storage/'.$product->image) }}" height="100px" width="100px"  class="img-fluidd rounded" alt="Image">
                                     </div>
                                    </a>
                                     <div>
                                         <h6 class="mb-2">
                                            <a href="{{route('product.show',$product->uuid)}}"> {{ $product->name }}</a>
                                         </h6>
                                         <div class="d-flex mb-2">
                                             <i class="fa fa-star text-secondary"></i>
                                             <i class="fa fa-star text-secondary"></i>
                                             <i class="fa fa-star text-secondary"></i>
                                             <i class="fa fa-star text-secondary"></i>
                                             <i class="fa fa-star"></i>
                                         </div>
                                         <div class="d-flex mb-2">
                                             <h5 class="fw-bold me-2">{{ $product->price }}* / {{ $project_units[$product->unit] }}</h5>
                                             {{-- <h5 class="text-danger text-decoration-line-through">4.11 $</h5> --}}
                                         </div>
                                     </div>
                                 </div>
                               @endforeach
                                <div class="d-flex justify-content-center my-4">
                                    <a href="#" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew More</a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img data-url="{{asset('user_assets/img/banner-fruits.jpg')}}" class="img-fluid w-100 rounded" alt="">
                                    <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                        <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="fw-bold mb-0">Related products</h1>
                <div class="vesitable">
                    <div class="owl-carousel vegetable-carousel justify-content-center">
                        @foreach($related_products as $product)
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img data-url="{{ asset('storage/'.$product->image) }}" style="width: 118 !important; height: 270px  !important; class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">{{ $product->category->name }}</div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>{{ $product->name }}</h4>
                                <p>{{ $product->description }}</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold">{{ $product->price }}* / {{ $project_units[$product->unit] }}</p>
                                    <a href="{{route('product.show',$product->uuid)}}" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product End -->
    
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function loadImages() {
            $('img').each(function(index, element) {
                var newSource = $(this).data('url');
                $(this).attr('src', newSource);
            });
        }
        loadImages();
    });
    
</script>
@endsection
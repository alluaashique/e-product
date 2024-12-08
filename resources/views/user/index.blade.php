@extends('user.layout.app')
@section('content')

 <!-- Hero Start -->
 <div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-secondary">100% Organic Foods</h4>
                <h1 class="mb-5 display-3 text-primary">Organic Veggies & Fruits Foods</h1>
                <div class="position-relative mx-auto">
                    <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="Search">
                    <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Submit Now</button>
                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <img data-url="{{ asset('user_assets/img/hero-img-1.png') }}" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Fruites</a>
                        </div>
                        <div class="carousel-item rounded">
                            <img data-url="{{ asset('user_assets/img/hero-img-2.jpg') }}" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Featurs Section Start -->
<div class="container-fluid featurs py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-car-side fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Free Shipping</h5>
                        <p class="mb-0">Free on order over $300</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-user-shield fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Security Payment</h5>
                        <p class="mb-0">100% security payment</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-exchange-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>30 Day Return</h5>
                        <p class="mb-0">30 day money guarantee</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fa fa-phone-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>24/7 Support</h5>
                        <p class="mb-0">Support every time fast</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featurs Section End -->


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Our Organic Products</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill active show-product" data-slug="all" data-id="0" data-bs-toggle="pill" href="#tab-1">
                                <span class="text-dark" style="width: 130px;">All Products</span>
                            </a>
                        </li>                      
                        @foreach ($productCategories as $productCategory)                           
                            <li class="nav-item">
                                <a class="d-flex py-2 m-2 bg-light rounded-pill show-product" data-slug="{{$productCategory->slug}}" data-id="{{$productCategory->id}}"  data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark" style="width: 130px;">{{$productCategory->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                
                
            </div>
        </div>      
    </div>
</div>
<!-- Fruits Shop End-->


<!-- Featurs Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <a href="#">
                    <div class="service-item bg-secondary rounded border border-secondary">
                        <img data-url="{{ asset('user_assets/img/featur-1.jpg') }}" class="img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-primary text-center p-4 rounded">
                                <h5 class="text-white">Fresh Apples</h5>
                                <h3 class="mb-0">20% OFF</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="#">
                    <div class="service-item bg-dark rounded border border-dark">
                        <img data-url="{{ asset('user_assets/img/featur-2.jpg') }}" class="img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-light text-center p-4 rounded">
                                <h5 class="text-primary">Tasty Fruits</h5>
                                <h3 class="mb-0">Free delivery</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="#">
                    <div class="service-item bg-primary rounded border border-primary">
                        <img data-url="{{ asset('user_assets/img/featur-3.jpg') }}" class="img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-secondary text-center p-4 rounded">
                                <h5 class="text-white">Exotic Vegitable</h5>
                                <h3 class="mb-0">Discount 30$</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Featurs End -->


<!-- Vesitable Shop Start-->
<div class="container-fluid vesitable py-5">
    <div class="container py-5">
        <h1 class="mb-0">Fresh Organic Vegetables</h1>
        <div class="owl-carousel vegetable-carousel justify-content-center">
            @foreach($getFreshOrganicProducts as $product)
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img data-url="{{ asset('storage/'.$product->image) }}" style="width: 118 !important; height: 270px  !important;"  class="img-fluid w-100 rounded-top load-images" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">{{ $product->category->name }}</div>                          

                    <div class="p-4 rounded-bottom">
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->short_description }}</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">{{ $product->price }}</p>
                            <a href="{{route('product.show',$product->uuid)}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Vesitable Shop End -->


<!-- Banner Section Start-->
<div class="container-fluid banner bg-secondary my-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="py-4">
                    <h1 class="display-3 text-white">Fresh Exotic Fruits</h1>
                    <p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
                    <p class="mb-4 text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                    <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img data-url="{{ asset('user_assets/img/baner-1.png') }}" class="img-fluid w-100 rounded" alt="">
                    <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
                        <h1 style="font-size: 100px;">1</h1>
                        <div class="d-flex flex-column">
                            <span class="h2 mb-0">50$</span>
                            <span class="h4 text-muted mb-0">kg</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->


<!-- Bestsaler Product Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4">Bestseller Products</h1>
            <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
        </div>
        <div class="row g-4">
            @foreach ($getBestSellerProducts as $product) 
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img data-url="{{ asset('storage/'.$product->image) }}" style="width: 118px !important; height: 118px  !important;" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="{{route('product.show',$product->uuid)}}" class="h5">{{$product->name}}</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">{{$product->price}}</h4>
                                <a href="{{route('product.show',$product->uuid)}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Bestsaler Product End -->


<!-- Fact Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="bg-light p-5 rounded">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter bg-white rounded p-5">
                        <i class="fa fa-users text-secondary"></i>
                        <h4>satisfied customers</h4>
                        <h1>1963</h1>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter bg-white rounded p-5">
                        <i class="fa fa-users text-secondary"></i>
                        <h4>quality of service</h4>
                        <h1>99%</h1>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter bg-white rounded p-5">
                        <i class="fa fa-users text-secondary"></i>
                        <h4>quality certificates</h4>
                        <h1>33</h1>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter bg-white rounded p-5">
                        <i class="fa fa-users text-secondary"></i>
                        <h4>Available Products</h4>
                        <h1>789</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fact Start -->


<!-- Tastimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="testimonial-header text-center">
            <h4 class="text-primary">Our Testimonial</h4>
            <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img data-url="{{ asset('user_assets/img/testimonial-1.jpg') }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img data-url="{{ asset('user_assets/img/testimonial-1.jpg') }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img data-url="{{ asset('user_assets/img/testimonial-1.jpg') }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tastimonial End -->


<script>
    $(document).ready(function () {
        // Set up CSRF token
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

        function getProducts(category) {
            $.ajax({
                url: "{{ route('getProduct') }}", // Replace with your route
                type: "GET",
                data: { category: category }, // Replace with your data
                success: function (response) {
                    console.log(response);
                    if(response.length == 0) {
                        $('#response').html('');
                        return;
                    }
                    else
                    {
                        var assetBasePath = "{{ asset('storage') }}";
                        var productShowBaseUrl = "{{ url('product') }}";
                        
                        var html = '';
                        html += '<div id="tab-1" class="tab-pane fade show p-0 active">';
                        html += '<div class="row g-4">';
                        html += '<div class="col-lg-12">';
                        html += '<div class="row g-4">';
                        for (var i = 0; i < response.length; i++) {
                            html += '<div class="col-md-6 col-lg-4 col-xl-3">';                            
                            html += '<div class="rounded position-relative fruite-item">';                            
                            html += '<div class="fruite-img">';
                            html += '<img  src="' + assetBasePath  +'/'+ response[i].image + '" style="width: 118 !important; height: 410px  !important;" class="img-fluid w-100 rounded-top" alt="">';                            
                            html += '</div>';                            
                            html += '<div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">'+ response[i].category.name + '</div>';                            
                            html += '<div class="p-4 border border-secondary border-top-0 rounded-bottom">';
                            html += '<h4> ' + response[i].name + '</h4>';
                            html += '<p> ' + response[i].short_description + '</p>';
                            html += '<div class="d-flex justify-content-between flex-lg-wrap">';                            
                            html += '<p class="text-dark fs-5 fw-bold mb-0">' + response[i].price + '</p>';
                            html += '<a href="' + productShowBaseUrl + '/' + response[i].uuid + '" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        }
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        $('.tab-content').append(html);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: ", status, error);
                }
            });
        }
        getProducts(null);        
        $('.show-product').click(function () {
            var category = $(this).data('category');
            getProducts(category);
        });


        function getFreshOrganicProducts(request) {
            $.ajax({
                url: "{{ route('getFreshOrganicProducts') }}",
                type: "GET",
                data: { category: request }, // Replace with your data
                success: function (response) {
                    console.log(response);
                    if(response.length == 0) {
                        $('#response').html('');
                        return;
                    }
                    else
                    {
                        var assetBasePath = "{{ asset('storage') }}";
                        var productShowBaseUrl = "{{ url('product') }}";
                        
                        var html = '';
                        for (var i = 0; i < response.length; i++) {
                            html += '<div class="border border-primary rounded position-relative vesitable-item">';
                            html += '<div class="vesitable-img">';
                            html += '<img src="' + assetBasePath  +'/'+ response[i].image + '" class="img-fluid w-100 rounded-top" alt="">';
                            html += '</div>';
                            html += '<div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">' + response[i].category.name + '</div>';                            
                            html += '<div class="p-4 rounded-bottom">';
                            html += '<h4>' + response[i].name + '</h4>';
                            html += '<p> ' + response[i].short_description + '</p>';                            
                            html += '<div class="d-flex justify-content-between flex-lg-wrap">';
                            html += '<p class="text-dark fs-5 fw-bold mb-0">' + response[i].price + '</p>';
                            html += '<a href="' + productShowBaseUrl + '/' + response[i].id + '" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        }
                        $('.vegetable-carousel').append(html);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: ", status, error);
                }
            });
        }
        // getFreshOrganicProducts(null);


        // $('#ajaxButton').click(function () {
        //     $.ajax({
        //         url: "{{ route('getProduct') }}", // Replace with your route
        //         type: "POST",
        //         data: { key: "value" }, // Replace with your data
        //         success: function (response) {
        //             $('#response').html(response.message);
        //         },
        //         error: function (xhr, status, error) {
        //             console.error("AJAX Error: ", status, error);
        //         }
        //     });
        // });
    });
</script>




@endsection

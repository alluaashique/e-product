<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>{{ config('projectConfig.project_title') }}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('user_assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('user_assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('user_assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('user_assets/css/style.css') }}" rel="stylesheet">

        <!-- custom Stylesheet -->
        <link href="{{ asset('user_assets/css/custom.css') }}" rel="stylesheet">


        
        <!-- jQuery (only include once) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


    </head>

    <body>
        @php
        use Illuminate\Support\Str;
        @endphp

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">


                        @if(config('projectConfig.project_address'))
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="{{ config('projectConfig.project_location') }}" class="text-white">{{ config('projectConfig.project_address') }}</a></small>
                        @endif
                        @if(config('projectConfig.project_email'))
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="mailto:{{ config('projectConfig.project_email') }}" class="text-white">{{ config('projectConfig.project_email') }}</a></small>
                        @endif
                        @if(config('projectConfig.project_phone'))
                        <small class="me-3"><i class="fas fa-phone me-2 text-secondary"></i><a href="tel:{{ config('projectConfig.project_phone') }}" class="text-white">{{ config('projectConfig.project_phone') }}</a></small>
                        @endif
                        {{-- @if(config('projectConfig.project_phone') || config('projectConfig.project_phone2'))
                        <div class="d-flex p-4 rounded bg-white">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Telephone</h4>
                                <p class="mb-2">{{ config('projectConfig.project_phone') }}</p>
                                <p class="mb-2">{{ config('projectConfig.project_phone2') }}</p>
                            </div>
                        </div>
                        @endif --}}




                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                        <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="{{ route('index')}}" class="navbar-brand"><h1 class="text-primary display-6">{{ config('projectConfig.project_title') }}</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{ route('index')}}" class="nav-item nav-link  @if(Route::currentRouteName() == 'index') active @endif">Home</a>
                            <a href="{{route('product.index')}}" class="nav-item nav-link @if(Route::currentRouteName() == 'product.index') active @endif">Produts</a>
                            <a href="{{route('about')}}" class="nav-item nav-link @if(Route::currentRouteName() == 'about') active @endif">About</a>
                            <a href="{{route('blog.index')}}" class="nav-item nav-link @if (Str::startsWith(Route::currentRouteName(), 'blog')) active @endif">Blog</a>


                            {{-- 
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart.html" class="dropdown-item">Cart</a>
                                    <a href="chackout.html" class="dropdown-item">Chackout</a>
                                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a>
                                </div>
                            </div>
                            --}}
                            <a href="{{route('contact-us.index')}}" class="nav-item nav-link @if (Str::startsWith(Route::currentRouteName(), 'contact-us')) active @endif">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <a href="#" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                            </a>
                            <a href="#" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" id="search" name="search" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3 search-product"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

         @yield('content')
       

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="{{route('index')}}">
                                <h1 class="text-primary mb-0">{{ config('projectConfig.project_title') }}</h1>
                                <p class="text-secondary mb-0">{{ config('projectConfig.project_tagline') }}</p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                @if(config('projectConfig.project_facebook'))
                                    <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="{{ config('projectConfig.project_facebook') }}"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if(config('projectConfig.project_twitter'))
                                    <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href="{{ config('projectConfig.project_twitter') }}"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if(config('projectConfig.project_youtube'))
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="{{ config('projectConfig.project_youtube') }}"><i class="fab fa-youtube"></i></a>
                                @endif
                                @if(config('projectConfig.project_instagram'))
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="{{ config('projectConfig.project_instagram') }}"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if(config('projectConfig.project_whatsapp'))
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href="{{ config('projectConfig.project_whatsapp') }}"><i class="fab fa-whatsapp"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Why People Like us!</h4>
                            <p class="mb-4">typesetting, remaining essentially unchanged. It was 
                                popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                            <a href="{{ route('about') }}" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Shop Info</h4>
                            <a class="btn-link" href="{{ route('about') }}">About Us</a>
                            <a class="btn-link" href="{{ route('contact-us.index') }}">Contact Us</a>
                            <a class="btn-link" href="javascript:void(0)">Privacy Policy</a>
                            <a class="btn-link" href="javascript:void(0)">Terms & Condition</a>
                            <a class="btn-link" href="javascript:void(0)">Return Policy</a>
                            <a class="btn-link" href="javascript:void(0)">FAQs & Help</a>
                            <a class="btn-link" href="{{asset('/brochure/brochure.pdf')}}">Brochure</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Account</h4>
                            <a class="btn-link" href="javascript:void(0)">My Account</a>
                            <a class="btn-link" href="javascript:void(0)">Shop details</a>
                            <a class="btn-link" href="javascript:void(0)">Shopping Cart</a>
                            <a class="btn-link" href="javascript:void(0)">Wishlist</a>
                            <a class="btn-link" href="javascript:void(0)">Order History</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            @if(config('projectConfig.project_address'))                            
                                <p>Address: <a href="{{ config('projectConfig.project_location') }}"> {{ config('projectConfig.project_address') }} </a></p>
                            @endif
                            @if(config('projectConfig.project_email'))                            
                                <p>Email: <a href="mailto:{{ config('projectConfig.project_email') }}"> {{ config('projectConfig.project_email') }} </a> </p>
                            @endif
                            @if(config('projectConfig.project_phone'))                            
                                <p>Phone: <a href="tel:{{ config('projectConfig.project_phone') }}"> {{ config('projectConfig.project_phone') }} </a> </p>
                            @endif
                            <img src="{{ asset('user_assets/img/payment.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="{{route('index')}}"><i class="fas fa-copyright text-light me-2"></i> {{ config('projectConfig.project_title') }}
                        </a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user_assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('user_assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('user_assets/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('user_assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('user_assets/js/main.js') }}"></script>
    </body>

    <script>

        $(document).ready(function () {
            $('.search-product').click(function () {
                var search = $("#search").val().trim();
                if (search === '') {
                    e.preventDefault(); // Prevent form submission
                    alert('Please enter a search term.'); // Notify the user
                }
                var url = "{{route('product.index')}}";
                var params = [];
                if (search) params.push("search=" + encodeURIComponent(search));
                if (params.length > 0) {
                    url += "?" + params.join("&");
                }
                window.location.href = url;
            });
        });

    </script>

</html>

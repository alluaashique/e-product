@extends('user.layout.app')
@section('content')
    <div class="inner-banner">
        <section class="w3l-breadcrumb py-5">
            <div class="container py-lg-5 py-md-3">
                <h2 class="title">About Us</h2>
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
    <section class="w3l-aboutblock1 py-5" id="about">
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="title-small">A little about Us</h5>
                    <h3 class="title-big">Welcome to Anandatheeram Charitable Society</h3>
                    <p class="mt-3">Anandatheeram Charitable Society, based in Kollam, Kerala, is dedicated to improving
                        the lives of underprivileged individuals and communities.</p>
                    <p class="mt-3">
                        Focused on various social issues, the society aims to provide education, healthcare, and support
                        services to those in need.</p>
                    <h3 class="title mt-4">"Over 20 Years of Accomplishments”</h3>
                    <a href="#MoreAboutUs" class="btn btn-primary btn-style mt-lg-5 mt-4">Learn More about Us</a>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5">
                    <img src="{{ asset('user_assets/images/about.jpg') }}" alt="" class="radius-image img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- forms -->
    <section class="w3l-forms-9 py-5" id="">
        <div class="main-w3 py-lg-5 py-md-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="main-midd col-lg-9">
                        <h3 class="title-big">Facts about Anandatheeram Charitable Society</h3>
                        <p class="mt-3">Through various programs and initiatives, Anandatheeram strives to empower
                            marginalized groups, foster community development, and promote social welfare. The society
                            invites volunteers and donors to join its mission in making a meaningful impact on the lives of
                            the less fortunate.</p>
                    </div>
                    <div class="main-midd-2 col-lg-3 mt-lg-0 mt-4 text-lg-right">
                        <a class="btn btn-style btn-primary" href="donate.html"><span class="fa fa-heart mr-1"></span>
                            Donate
                            Now </a>
                    </div>
                </div>

                <div class="donar-img mt-5">
                    <div class="right-side text-center">
                        <span class="fa fa-heart"></span>
                        <p>OUR TOP DONAR</p>
                        <h3 class="big my-3">$1.6m</h3>
                        <a class="btn btn-text" href="#ViewMore">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //forms -->
    <section class="w3l-aboutblock3 py-5" id="videos">
        <div class="video-recipe py-lg-5 py-md-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 align-self">
                        <h3 class="title-big">Empowering the Poor to Face the Future with Pride</h3>
                        <p class="mt-4">
                            At Anandatheeram Charitable Society, we believe in the dignity and potential of every
                            individual. Our mission is to empower the poor, helping them to rise above their circumstances
                            and face the future with pride. Through education, healthcare, and support services, we provide
                            the tools and resources needed for self-sufficiency and resilience. Together, we can uplift
                            lives and foster a community where everyone can stand tall and embrace their future with
                            confidence. Join us in this journey of transformation!

                        </p>
                    </div>
                    <div class="col-lg-7 mt-lg-0 mt-md-5 mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <iframe src="https://www.youtube.com/embed/MG3jGHnBVQs" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                <h3 class="video-title mt-sm-4 mt-3">The man of the poor.</h3>
                            </div>
                            <div class="col-md-6 mt-md-0 mt-5">
                                <iframe src="https://www.youtube.com/embed/MG3jGHnBVQs" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                <h3 class="video-title mt-sm-4 mt-3">Mission of “garbage people”</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/team-sec-->
    <section class="w3l-team-main" id="team">
        <div class="team py-5">
            <div class="container py-lg-5">
                <div class="title-content text-center">
                    <h3 class="title-big">Happy Volunteers</h3>
                </div>
                <div class="team-row mt-md-5 mt-4">
                    <div class="team-wrap">
                        <div class="team-member text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/images/team1.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Luke jacobs</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/images/team2.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Claire olson</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/images/team3.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Phillip hunt</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/images/team4.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Sara grant</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/images/team5.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Sara grant</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/images/team6.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Sara grant</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/images/team7.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Sara grant</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/images/team8.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Sara grant</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/images/team9.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Sara grant</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-apply">
                        <a href="#url" class="team-title m-0"><span class="fa fa-plus-circle d-block mb-3"></span>
                            Apply for Volunteer</a>
                    </div>

                </div>
            </div>
    </section>
    <!--//team-sec-->
    <!-- testimonials -->
    <section class="w3l-testimonials" id="testimonials">
        <!-- /grids -->
        <div class="customer-layout py-5">
            <div class="container py-lg-5 py-md-4">
                <div class="heading align-self text-center">
                    <h6 class="title-small">Our Testimonials</h6>
                    <h3 class="title-big mb-md-5 mb-4">Over 20 Years of Accomplishments</h3>
                </div>
                <!-- /grids -->
                <div class="row testimonial-row">
                    <div id="owl-demo1" class="owl-two owl-carousel owl-theme mb-lg-3 mb-5">
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>One of the best rehabilitation centre in kollam for differentially abled
                                            children.</q>
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="test-img"><img src="{{ asset('user_assets/images/team1.jpg') }}" class="img-fluid"
                                                alt="client-img">
                                        </div>
                                        <div class="peopl align-self">
                                            <h3>Ameera</h3>
                                            <p class="indentity">Donor </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                                            laudantium
                                            voluptate rem ullam dolore nisi voluptatibus est quasi, doloribus tempora.</q>
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="test-img"><img src="{{ asset('user_assets/images/team2.jpg') }}" class="img-fluid"
                                                alt="client-img">
                                        </div>
                                        <div class="peopl align-self">
                                            <h3>Elaine F. Marshall</h3>
                                            <p class="indentity">Secretary of State </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                                            laudantium
                                            voluptate rem ullam dolore nisi voluptatibus est quasi, doloribus tempora.</q>
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="test-img"><img src="{{ asset('user_assets/images/team3.jpg') }}" class="img-fluid"
                                                alt="client-img">
                                        </div>
                                        <div class="peopl align-self">
                                            <h3>Janice Hoffman</h3>
                                            <p class="indentity">Chief Operating Officer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                                            laudantium
                                            voluptate rem ullam dolore nisi voluptatibus est quasi, doloribus tempora.</q>
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="test-img"><img src="{{ asset('user_assets/images/team4.jpg') }}" class="img-fluid"
                                                alt="client-img">
                                        </div>
                                        <div class="peopl align-self">
                                            <h3>Stefan Homa</h3>
                                            <p class="indentity">Charity architect</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                                            laudantium
                                            voluptate rem ullam dolore nisi voluptatibus est quasi, doloribus tempora.</q>
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="test-img"><img src="{{ asset('user_assets/images/team2.jpg') }}" class="img-fluid"
                                                alt="client-img">
                                        </div>
                                        <div class="peopl align-self">
                                            <h3>Jeannie Gooch</h3>
                                            <p class="indentity">Funding teacher</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                                            laudantium
                                            voluptate rem ullam dolore nisi voluptatibus est quasi, doloribus tempora.</q>
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="test-img"><img src="{{ asset('user_assets/images/team3.jpg') }}" class="img-fluid"
                                                alt="client-img">
                                        </div>
                                        <div class="peopl align-self">
                                            <h3>Elaine F. Marshall</h3>
                                            <p class="indentity">Secretary of State</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /grids -->
        </div>
        <!-- //grids -->
    </section>
    <!-- //testimonials -->
@endsection

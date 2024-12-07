@extends('user.layout.app')
@section('content')
     <!-- Single Page Header start -->
  <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">About</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
        <li class="breadcrumb-item active text-white">About</li>
    </ol>
</div>
<!-- Single Page Header End -->
    <!-- banner bottom shape -->
    <section class="w3l-aboutblock1 py-5" id="about">
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="title-small">PRIDHWI at a glance……</h5>
                    <h3 class="title-big"> Primary objective</h3>
                    <p class="mt-3">Pridhwi Farmer Producer company is formed under the 10000 FPO scheme promoted by the Government of India under the National Dairy Development Board (NDDB) which is the implementing agency and CISSA is the cluster-based business support organization. Pridhwi is categorized as a Fodder plus FPC which is one of the five FPC’s under the NDDB.</p>
                    <p class="mt-3">Pridhwi FPC was incorporated on 10/04/2023 under the Indian Companies Act and its office is at Puthethu, near Sreenarayanapuram Mahavishnu temple, East Kallada, Kollam- 691502. It is a district-based Fodder FPC.</p>
                    <p class="mt-3">Pridhwi FPC has, at present 310 member shareholders and 10 Board of Directors in the first FY 2023-24. Pridhwi FPC is expanding rapidly by adding more shareholders from Kollam District. It has an authorized capital of Rs 50,00,000/-.</p>
                    <p class="mt-3">Sri Kallada Ramesh is the Chairman of Pridhwi FPC and has 10 eminent and proven directors who are pioneers in the fields of Agriculture, Dairy farming, and Pisciculture.</p>
                    <p class="mt-3">Sri G Hariharan is the Chief Executive Officer and Sri Nirmal K Mohan is the accountant.</p>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5">
                    <img src="{{ asset('user_assets/img/team1.jpg') }}" alt="about" class="radius-image img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- forms -->
    <section class="w3l-forms-9 py-5" id="">
        <div class="main-w3 py-lg-5 py-md-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="main-midd col-lg-12">
                        <h3 class="title-big">Primary objective</h3>          
                        <p class="mt-4">
                                The primary objective of the formation of Pridhwi FPC is to promote and safeguard the interest of the farmers, especially Dairy farmers in the district of Kollam, by providing quality and economical farmer inputs like Straw, Silage, Cattle feed, Mineral mixture, feed supplements and to conduct the trading of Millets and Coconut based products under its brand name, thereby monetizing its shareholders.
                        </p>
                        <p class="mt-4">
                            It also helps its shareholders establish various small- and medium-scale enterprises and startups with the support of both the central and State governments including financial, and technical support.
                        </p>
                    </div>
                    <div class="main-midd col-lg-12">
                        <h3 class="title-big">Operations</h3>          
                        <p class="mt-4">
                            Pridhwi has obtained all mandatory licenses like FSSAI, GST, UDYAM,
                            E- nam etc. to conduct business, especially food-oriented business activities.
                        </p>
                        <p class="mt-4">
                            It started its operations by selling baled straws from Kuttanad to primary cooperative societies in the district. The first sales of Pridhwi were conducted in the last week of March 2024 by selling straws to Thodiyoor Milk Society, Karunagappally. We have sold 22 Mt of Baled straw so far.
                        </p>
                        <p class="mt-4">
                            Pridhwi will be putting into market millet-based natural products, including both ready-to-eat and non-ready-to-eat products. Also, high-quality, Coconut products made through the state-of-the-art manufacturing facilities from the sophisticated manufacturing plants of Kerala, under our brand name will also be ready by December midst, 2024.
                        </p>
                        <p class="mt-4">
                            We have just test-marketed certain products as shown above and the results are awesome. This propels us to introduce these products to the open market in the coming months.
                        </p>
                    </div>
                    <div class="main-midd col-lg-12">
                        <h3 class="title-big">Future plans</h3>          
                        <p class="mt-4">
                            Our plans include 
                        </p>
                        <p class="mt-4">
                            producing and marketing the Pridhwi brand Cattle feed, from our hired production centres in Tamilnadu.
                        </p>
                        <p class="mt-4">
                            Launching more natural edible and ready-to-cook products to market under the Pridhwi brand name.
                        </p>
                        <p class="mt-4">
                            Marketing of Silage, green fodder, etc in the coming months.
                        </p>
                        <p class="mt-4">
                            Creating startups and entrepreneurial avenues among our shareholders.
                        </p>
                    </div>
                </div>               
            </div>
        </div>
    </section>
    <!-- //forms -->   
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
                                <img src="{{ asset('user_assets/img/team1.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Luke jacobs</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/img/team2.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Claire olson</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/img/team3.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Phillip hunt</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/img/team4.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Sara grant</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/img/team5.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Sara grant</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/img/team6.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Sara grant</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/img/team7.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Sara grant</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/img/team8.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Sara grant</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->

                    <div class="team-wrap">
                        <div class="team-member last text-center">
                            <div class="team-img">
                                <img src="{{ asset('user_assets/img/team9.jpg') }}" alt="" class="radius-image img-fluid">
                            </div>
                            <a href="#url" class="team-title">Sara grant</a>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    <!-- end team member -->
                </div>
            </div>
    </section>
    <!--//team-sec-->  
@endsection

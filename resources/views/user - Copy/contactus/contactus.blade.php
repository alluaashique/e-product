@extends('user.layout.app')
@section('content')
    <div class="inner-banner">
        <section class="w3l-breadcrumb py-5">
            <div class="container py-lg-5 py-md-3">
                <h2 class="title">Contact Us</h2>
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
    <!-- contacts -->
    <section class="w3l-contact-7 py-5" id="contact">
        <div class="contacts-9 py-lg-5 py-md-4">
            <div class="container">
                <div class="top-map">
                    <div class="row map-content-9">
                        <div class="col-lg-8">
                            <h3 class="title-big">Send us a Message</h3>
                            <p class="mb-4 mt-lg-0 mt-2">Your email address will not be published. Required fields are
                                marked *</p>
                            <form action="{{route('contact-us.store')}}" method="post" class="text-right">
                                @csrf
                                <div class="form-grid">
                                    <input type="text" name="name" id="name" placeholder="Name*" required value="{{ old('name') }}">
                                    @error('name') {{$message}} @enderror
                                    <input type="email" name="email" id="email" placeholder="Email*" required value="{{ old('email') }}">
                                    @error('email') {{$message}} @enderror
                                    <input type="text" name="phone" id="phone" placeholder="Phone number*" required value="{{ old('phone') }}">
                                    @error('phone') {{$message}} @enderror
                                    <input type="text" name="subject" id="subject" placeholder="Subject*" required value="{{ old('subject') }}">
                                    @error('subject') {{$message}} @enderror
                                </div>
                                <textarea name="message" id="message" placeholder="Message*">{{ old('message') }}</textarea>
                                @error('message') {{$message}} @enderror
                                <button type="submit" class="btn btn-primary btn-style mt-3">Send Message</button>
                            </form>
                        </div>
                        <div class="col-lg-4 cont-details">
                            <address>
                                <h5 class="">Contact Address</h5>
                                <p><span class="fa fa-map-marker"></span>                                  
                                  @if(config('projectConfig.project_name'))
                                  {{ config('projectConfig.project_name') }},
                                  @endif
                                  @if(config('projectConfig.project_address'))
                                  {{ config('projectConfig.project_address') }}
                                  @endif
                                </p>


                              
                                @if(config('projectConfig.project_email'))
                                  <p> <a href="mailto:{{ config('projectConfig.project_email') }}"><span class="fa fa-envelope"></span>{{ config('projectConfig.project_email') }}</a></p>
                                @endif
                                @if(config('projectConfig.project_email2'))
                                  <p> <a href="mailto:{{ config('projectConfig.project_email2') }}"><span class="fa fa-envelope"></span>{{ config('projectConfig.project_email2') }}</a></p>
                                @endif
                                @if(config('projectConfig.project_phone'))
                                  <p><span class="fa fa-phone"></span><a href="tel:{{ config('projectConfig.project_phone') }}"> {{ config('projectConfig.project_phone') }}</a></p>
                                @endif
                                @if(config('projectConfig.project_phone2'))
                                  <p><span class="fa fa-phone"></span><a href="tel:{{ config('projectConfig.project_phone2') }}"> {{ config('projectConfig.project_phone2') }}</a></p>
                                @endif

                                {{-- <p> <a href="mailto:{{ config('projectConfig.project_email2') }}"><span class="fa fa-envelope"></span>{{ config('projectConfig.project_email2') }}</a></p>
                                <p><span class="fa fa-phone"></span><a href="tel:{{ config('projectConfig.project_phone2') }}"> {{ config('projectConfig.project_phone2') }}</a></p> --}}
                                <a href="{{route('donate')}}" class="btn btn-style btn-outline-primary mt-4">
                                    <span class="fa fa-heart mr-1"></span> Make Donation</a>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //contacts -->

    @if(config('projectConfig.project_map'))
        <div class="map">
            <iframe
                src="{{config('projectConfig.project_map')}}"
                frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </div>
    @endif   
@endsection

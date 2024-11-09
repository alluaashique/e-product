@extends('user.layout.app')
@section('content')
    <div class="inner-banner">
        <section class="w3l-breadcrumb py-5">
            <div class="container py-lg-5 py-md-3 text-center">
                <h4 class="title">Your Support can Make a Huge Difference</h4>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li>Donate</li>
                </ul>
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
    <!-- donate -->
    <section class="w3l-donate py-5" id="donate">
        <div class="container py-lg-5 py-md-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="donate-details mt-0">
                        <h5 class="">Any query call us</h5>
                        @if(config('projectConfig.project_phone'))
                            <p class="phone"><a href="tel:{{ config('projectConfig.project_phone') }}">{{ config('projectConfig.project_phone') }}</a></p>
                        @endif
                        @if(config('projectConfig.project_phone2'))
                            <p class="phone"><a href="tel:{{ config('projectConfig.project_phone2') }}">{{ config('projectConfig.project_phone2') }}</a></p>
                        @endif
                        <h6 class="mt-4 mb-2"><span class="fa fa-envelope-open"></span>Email Us</h6>
                        @if(config('projectConfig.project_email'))
                            <p><a href="mailto:{{ config('projectConfig.project_email') }}">{{ config('projectConfig.project_email') }}</a></p>
                        @endif
                        @if(config('projectConfig.project_email2'))
                            <p><a href="mailto:{{ config('projectConfig.project_email2') }}">{{ config('projectConfig.project_email2') }}</a></p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8 mt-lg-0 mt-4">
                    <div class="donate-details mt-0">
                        <h5 class="mb-3">Our payment details</h5>
                        <p>To scan a QR code, you need to have one of the following things: A barcode reader that has the
                            capability to scan QR codes. Tablet or a smartphone with an inbuilt camera.</p>
                        <div class="barcode-details">
                            <img src="{{ asset('user_assets/images/barcode.png') }}" alt="" class="mt-4 img-fluid">
                        </div>
                        <ul class="bank-details">
                            <li>
                                <p class="bank">Account Name</p> <b>:</b><span class="details">XXXXXXXXXXXXXXXXXXX,</span>
                            </li>
                            <li>
                                <p class="bank">Account NO</p> <b>:</b><span class="details">XXXXXXXX.
                                    <b>XXXXXXXXXX</b></span>
                            </li>
                            <li>
                                <p class="bank">Bank Name</p> <b>:</b><span class="details"><b>XXXXXXXXXXXX,</b></span>
                            </li>
                            <li>
                                <p class="bank">Branch</p> <b>:</b><span class="details">XXXX XXXXXX, XXXXX XXXX
                                    XXXX</span>
                            </li>

                            <li>
                                <p class="bank">Barnch Code</p> <b>:</b><span class="details">XXXXXX</span>
                            </li>
                            <li>
                                <p class="bank">IFSC Code</p> <b>:</b><span class="details">XXXXXXX</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </section>
    <!-- //donate -->
@endsection

@extends('user.layout.app')
@section('content')
    <div class="inner-banner">
        <section class="w3l-breadcrumb py-5">
            <div class="container py-lg-5 py-md-3">
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
    <!-- error section -->
    <section id="error" class="w3l-error py-5 text-center">
        <div class="container py-lg-4 py-md-3">
            <div class="error-grid">
                <h1 class="error-title">4<span class="fa fa-heart-o"></span>4</h1>
                <h2>Page Not Found</h2>
                <p class="mt-4">Sorry, we're offline right now to make our site even better. Please, come back later and
                    check what we've been up to.
                </p>
                <a href="{{ route('index') }}" class="btn btn-style btn-outline-primary mt-md-5 mt-4"> Back to home</a>
            </div>
        </div>
    </section>
@endsection


@extends('user.layout.app')
@section('content')
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Contact</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                <li class="breadcrumb-item active text-white">Contact</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">Get in touch</h1>
                                <p class="mb-4"></p>
                            </div>
                        </div>
                        @if(config('projectConfig.project_map'))
                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <iframe class="rounded w-100" 
                                style="height: 400px;" src="{{config('projectConfig.project_map')}}" 
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        @endif  
                        <div class="col-lg-7">
                            <form action="{{route('contact-us.store')}}" method="post" class="">
                                @csrf
                                <input type="text" class="w-100 form-control border-0 py-3 mb-4" 
                                placeholder="Your Name"  name="name" id="name" required value="{{ old('name') }}" >
                                @error('name') {{$message}} @enderror
                                <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email"
                                name="email" id="email" required value="{{ old('email') }}">
                                @error('email') {{$message}} @enderror
                                <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Phone"
                                name="phone" id="phone" required value="{{ old('phone') }}">
                                @error('phone') {{$message}} @enderror
                                <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Subject"
                                name="subject" id="subject" required value="{{ old('subject') }}">
                                @error('subject') {{$message}} @enderror
                                <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Your Message"
                                name="message" id="message" required>{{ old('message') }}</textarea>
                                @error('message') {{$message}} @enderror
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            @if(config('projectConfig.project_address'))
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>                               
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-2">{{ config('projectConfig.project_address') }}</p>
                                </div>
                            </div>
                            @endif
                            @if(config('projectConfig.project_email') || config('projectConfig.project_email2'))
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-2">{{ config('projectConfig.project_email') }}</p>
                                    <p class="mb-2">{{ config('projectConfig.project_email2') }}</p>
                                </div>
                            </div>
                            @endif
                            @if(config('projectConfig.project_phone') || config('projectConfig.project_phone2'))
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-2">{{ config('projectConfig.project_phone') }}</p>
                                    <p class="mb-2">{{ config('projectConfig.project_phone2') }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

@endsection
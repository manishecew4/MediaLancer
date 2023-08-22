@extends('layouts.user')

@section('content')
    <section class="main_empDetails">
        <section class="mt60px pr">
            <div class="pr w-100" style="background: #6c757d4a;">
                <div class="bg3d">
                    <!-- <img src="./assets/img/bg/bg.jpg" alt=""> -->
                    <div class="pr">
                        <div class="shape-blob one"></div>
                        <div class="shape-blob two"></div>
                        <div class="shape-blob three"></div>`
                    </div>
                </div>
                <div class="whiteLayer"></div>
                <div class="d-flex pr z99 flex-wrap">

                    <div class="col-sm-12 col-md-7 p-5">
                        <div class="workSlide">
                            @foreach ($photo_Gr as $item)
                                @foreach ($item['image'] as $img)
                                    <a href="{{ asset('/') }}{{ $img->path }}" class=""
                                        data-lightbox="wrkSmpl"><img src="{{ asset('/') }}{{ $img->path }}"
                                            alt=""></a>
                                @endforeach
                            @endforeach
                        </div>

                        <div class="workSlidefor mt-1">
                            @foreach ($photo_Gr as $item)
                                @foreach ($item['image'] as $img)
                                    <a class="wsf_inner"><img src="{{ asset('/') }}{{ $img->path }}"
                                            alt=""></a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="plan_tab">
                            <div class="tab plan_tab">
                                <button class="tablinks active" onclick="openPlan(event, 'Basic')">Basic</button>
                                <button class="tablinks" onclick="openPlan(event, 'Standard')">Standard</button>
                                <button class="tablinks" onclick="openPlan(event, 'Premium')">Premium</button>
                            </div>

                            <div id="Basic" class="tabcontent p-3">
                                <div class="d-flex aic jcsb">
                                    <h5 class="fw-bold">Starting at</h5>
                                    <h5 class="fw-bold">Rs. {{ $photo_Gr[0]['info']['photo']['basic'][0]['price'] }}</h5>
                                </div>
                                <div class="d-flex aic jcsb">
                                    <p class="mb-0">{{ $photo_Gr[0]['info']['photo']['basic'][0]['srt_desc'] }}</p>
                                </div>
                                <div class="d-block">
                                    <h5 class="fw-bold mt-3">{{ $photo_Gr[0]['info']['photo']['basic'][0]['max_del_time'] }}
                                    </h5>
                                    <p class="mb-0">{{ $photo_Gr[0]['info']['photo']['basic'][0]['support_txt'] }}</p>
                                    {{-- <p class="mb-0">High Resolution</p>
                                    <p class="mb-0">Commercial Use</p> --}}
                                </div>
                                <form action="{{route('req_booking')}}" method="post">
                                    @csrf

                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="plan" value="basic">
                                    <input type="hidden" name="vendor_id" value="{{$photo_Gr[0]['id']}}">
                                    <button type="submit" class="btn btn-success mt-3">Book Now</button>
                                    {{-- <a href="javascript:void(0);" class="btn btn-success mt-3" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Book Now</a> --}}
                                </form>
                            </div>

                            <div id="Standard" class="tabcontent p-3">
                                <div class="d-flex aic jcsb">
                                    <h5 class="fw-bold">Starting at</h5>
                                    <h5 class="fw-bold">Rs. {{ $photo_Gr[0]['info']['photo']['standard'][0]['price'] }}
                                    </h5>
                                </div>
                                <div class="d-flex aic jcsb">
                                    <p class="mb-0">{{ $photo_Gr[0]['info']['photo']['standard'][0]['srt_desc'] }}</p>
                                </div>
                                <div class="d-block">
                                    <h5 class="fw-bold mt-3">
                                        {{ $photo_Gr[0]['info']['photo']['standard'][0]['max_del_time'] }}</h5>
                                    <p class="mb-0">{{ $photo_Gr[0]['info']['photo']['standard'][0]['support_txt'] }}</p>
                                    {{-- <p class="mb-0">High Resolution</p>
                                    <p class="mb-0">Commercial Use</p> --}}
                                </div>
                                <form action="{{route('req_booking')}}" method="post">
                                    @csrf

                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="plan" value="standard">
                                    <input type="hidden" name="vendor_id" value="{{$photo_Gr[0]['id']}}">
                                    <button type="submit" class="btn btn-success mt-3">Book Now</button>
                                    {{-- <a href="javascript:void(0);" class="btn btn-success mt-3" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Book Now</a> --}}
                                </form>

                            </div>

                            <div id="Premium" class="tabcontent p-3">
                                <div class="d-flex aic jcsb">
                                    <h5 class="fw-bold">Starting at</h5>
                                    <h5 class="fw-bold">Rs. {{ $photo_Gr[0]['info']['photo']['premium'][0]['price'] }}</h5>
                                </div>
                                <div class="d-flex aic jcsb">
                                    <p class="mb-0">{{ $photo_Gr[0]['info']['photo']['premium'][0]['srt_desc'] }}</p>
                                </div>
                                <div class="d-block">
                                    <h5 class="fw-bold mt-3">
                                        {{ $photo_Gr[0]['info']['photo']['premium'][0]['max_del_time'] }}</h5>
                                    <p class="mb-0">{{ $photo_Gr[0]['info']['photo']['premium'][0]['support_txt'] }}</p>
                                    {{-- <p class="mb-0">High Resolution</p>
                                    <p class="mb-0">Commercial Use</p> --}}
                                </div>
                                <form action="{{route('req_booking')}}" method="post">
                                    @csrf

                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="plan" value="premium">
                                    <input type="hidden" name="vendor_id" value="{{$photo_Gr[0]['id']}}">
                                    <button type="submit" class="btn btn-success mt-3">Book Now</button>
                                    {{-- <a href="javascript:void(0);" class="btn btn-success mt-3" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Book Now</a> --}}
                                </form>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Employee Information -->
            <div class="emp_profile bg_lite py-5">
                <div class="d-flex flex-wrap container">
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="d-flex flex-column jcc aic">
                            <img src="./assets/img/user/a.jpg" alt="">
                            <h5 class="fw-bold">{{ $photo_Gr[0]['name'] }}</h5>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-9">
                        <div class="d-flex emp_info_txt">
                            <h5>Name</h5>
                            <h5>{{ $photo_Gr[0]['name'] }}</h5>
                        </div>
                        <div class="d-flex emp_info_txt">
                            <h5>Location</h5>
                            <h5>{{ $photo_Gr[0]['profile']['address'] }}</h5>
                        </div>
                        <div class="d-flex emp_info_txt">
                            <h5>Expert in</h5>
                            <h5>Wedding Photography</h5>
                        </div>
                        <div class="d-flex emp_info_txt">
                            <h5>About Me</h5>
                            <h5 class="descrptn">Hello there, Heartiest Greetings from India ! I am a professional Graphics
                                Designer & Photoshop expert having 15+ years’ experience in all kinds of photo editing,
                                photo album designing and printing work. I have my own design
                                & print studio. I can do all Photoshop editing work which is my passion. I have experienced
                                team so we can handle bulk projects efficiently. We can work for you as a one stop solution
                                for your entire photo editing, Photoshop
                                or photo album designing work. I strongly believe in long term relationship by quality work.
                                Please be assured that your projects are in safe hands.</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="workSamples mt-5">
                <div class="container">
                    <div class="d-flex">
                        <h5 class="fw-bold text-secondary">Work Samples</h5>
                    </div>
                    <div class="tab-slider--nav">
                        <ul class="tab-slider--tabs">
                            <li class="tab-slider--trigger mx-1 active" rel="tab1">
                                <i class="fa-solid fa-camera me-2"></i>Photos
                            </li>
                            <li class="tab-slider--trigger mx-1" rel="tab2">
                                <i class="fa-solid fa-video me-2"></i>Videos
                            </li>
                        </ul>
                        {{-- <div class="d-flex ps-4">
                            <select name="" id="" class="form-select filter_select">
                                <option disabled selected>Sort by Category</option>
                                <option value="">Wedding</option>
                                <option value="">Birthday</option>
                                <option value="">Trip</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="tab-slider--container">
                        <div id="tab1" class="tab-slider--body">
                            <div class="">
                                @foreach ($photo_Gr as $item)
                                    @foreach ($item['image'] as $img)
                                            <a href="{{ asset('/') }}{{ $img->path }}" data-lightbox="wrkSmplimg"
                                            class="col-xs-10 col-sm-6 col-md-4 col-lg-2 ">
                                            <img src="{{ asset('/') }}{{ $img->path }}" alt="" class="wrkSmplimg">
                                        </a>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div id="tab2" class="tab-slider--body wsinner">
                            <div class="">
                                @foreach ($video_Gr as $item)
                                    @foreach ($item['video'] as $vid)
                                        <a href="{{ asset('/') }}{{ $vid->path }}" data-lightbox="wrkSmplimg"
                                            class="col-xs-10 col-sm-6 col-md-4 col-lg-2 ">
                                            <video width="320" height="240" controls>
                                                <source src="{{ asset('/') }}{{ $vid->path }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </a>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-5 commentSection">
            <div class="container ms-5 ps-3 mt-5">
                <div class="d-flex justify-content-center row">
                    <div class="col-md-8">
                        <div class="d-flex flex-column comment-section">
                            <div class="bg-white p-2">
                                <div class="d-flex flex-row user-info">
                                    <img class="rounded-circle comment_img" src="./assets/img/user/a.jpg"
                                        width="40px me-2">
                                    <div class="d-flex flex-column justify-content-start ms-2">
                                        <span class="d-block font-weight-bold h6 name">Marry Andrews</span>
                                        <span class="pr">
                                            <span class="d-flex empRatings aic fw-bold">1.5 / 5</span>
                                        </span>
                                        <span class="date text-black-50 mt-2">Shared publicly - Jan 2020</span>
                                        <div class="mt-2">
                                            <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                aliquip
                                                ex ea commodo consequat.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="bg-light p-2">
                                <div class="d-flex flex-row align-items-start">
                                    <img class="rounded-circle comment_img" src="./assets/img/user/a.jpg"
                                        width="40px me-2">
                                    <div class="col ms-3">
                                        <textarea class="form-control ml-1 shadow-none textarea"></textarea>
                                        <div class="mt-2 text-right">
                                            <button class="btn btn_default_outline btn-sm me-3 shadow-none"
                                                type="button">Cancel</button>
                                            <button class="btn btn_default btn-sm shadow-none" type="button">Post
                                                Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

@extends('layouts.user')

@section('content')
    <div class="banner">
        <div class="bannerSlide">
            <div class="pr">
                <!-- <div class="bannerOverlay"></div> -->
                <img src="{{ asset('/') }}assets/img/a.jpg" alt="" class="w-100">
            </div>
            <div class="pr">
                <!-- <div class="bannerOverlay"></div> -->
                <img src="{{ asset('/') }}assets/img/b.jpg" alt="" class="w-100">
            </div>
            <div class="pr">
                <!-- <div class="bannerOverlay"></div> -->
                <img src="{{ asset('/') }}assets/img/c.jpg" alt="" class="w-100">
            </div>
        </div>

    </div>

    <div class="contentsBody">

        <section class="photographerSlideWrap mb-4">
            <h5 class="slideHead">Popular Photographers</h5>
            <div class="photographerSlide">

                @foreach ($photo_Gr as $item)
                    <div class="cardWrap">
                        <a class="card tdn" href="{{ route('user.emp_details', ['id' => $item['id']]) }}">
                            <div class="card_img pr">
                                <div class="pcSlide pr">
                                    @foreach ($item['image'] as $ii)
                                        <div class="pr h-100">
                                            <img src="{{ asset('/') }}{{ $ii->path }}" class="card-img-top"
                                                alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                <img src="{{ asset('/') }}assets/{{ $item['avatar'] }}" class="profile_thumb"
                                    alt="">
                                <span
                                    class="d-flex empRating aic fw-bold">{{ $item['avg_rating'] ? round($item['avg_rating'], 1) : 0 }}
                                    / 5</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-0">{{ $item['name'] }}</h5>
                                <p class="card-text">{{ $item['basic']['info'] }}</p>
                                <div class="d-flex jcsb mt-2">
                                    <span class="d-flex aic">
                                        <p class="mb-0 me-2 fs-6 h5">Starting Price</p>
                                        <h5 class="mb-0 priceStart">₹{{ $item['basic']['price'] }}</h5>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="videographerSlideWrap m_slider mb-4" style="margin-top:50px !important">
            <h5 class="slideHead">Popular Videographers</h5>
            <div class="videographerSlide">
                @foreach ($video_Gr as $item)
                    <div class="cardWrap">
                        <a class="card tdn" href="{{ route('user.emp_details', ['id' => $item['id']]) }}">
                            <div class="card_img pr">
                                <div class="vcSlide pr">
                                    <div class="pr test-vd h-100" id="v1">
                                        <video preload="auto" loop class="card-vid-top" alt="...">
                                            <source src="{{ isset($item['video']->path) ? $item['video']->path : '' }}"
                                                type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                                <img src="{{ asset('/') }}assets/{{ $item['avatar'] }}" class="profile_thumb"
                                    alt="">
                                <span
                                    class="d-flex empRating aic fw-bold">{{ $item['avg_rating'] ? round($item['avg_rating'], 1) : 0 }}
                                    / 5</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-0">{{ $item['name'] }}</h5>
                                <p class="card-text">{{ $item['basic']['info'] }}</p>
                                <div class="d-flex jcsb">
                                    <span class="d-flex">
                                        <p class="mb-0 me-2">Starting Price</p>
                                        <h5 class="mb-0 priceStart">₹{{ $item['basic']['price'] }}</h5>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </section>

        <section class="staticBanner bg_lite m_slider py-5">
            <div class="container d-flex aic jcsb flex-wrap">

                <div class="uspCard p-3 col-sm-6 col-md-3 col-lg-3">
                    <div class="uspImg text-center">
                        <img src="{{ asset('/') }}assets/img/icons/rupee.png" class="uspicon">
                    </div>
                    <div class="text-center mt-3">
                        <h6>Cost Effective</h6>
                        <p>We are budget friendly</p>
                    </div>
                </div>
                <div class="uspCard p-3 col-sm-6 col-md-3 col-lg-3">
                    <div class="uspImg text-center">
                        <!-- <i class="fa-solid fa-shield uspicon"></i> -->
                        <img src="{{ asset('/') }}assets/img/icons/shield.png" class="uspicon">
                    </div>
                    <div class="text-center mt-3">
                        <h6>Safeguarding your Money</h6>
                        <p>Usage of Escrow Account <br> to ensure that the agreements are met</p>
                    </div>
                </div>
                <div class="uspCard p-3 col-sm-6 col-md-3 col-lg-3">
                    <div class="uspImg text-center">
                        <!-- <i class="fa-solid fa-user-secret uspicon"></i> -->
                        <img src="{{ asset('/') }}assets/img/icons/confidential.png" class="uspicon">
                    </div>
                    <div class="text-center mt-3">
                        <h6>Maintaining Confidentiality</h6>
                        <p>We respect your outright privacy</p>
                    </div>
                </div>
                <div class="uspCard p-3 col-sm-6 col-md-3 col-lg-3">
                    <div class="uspImg text-center">
                        <!-- <i class="fa-brands fa-accessible-icon uspicon"></i> -->
                        <img src="{{ asset('/') }}assets/img/icons/accessbility.png" class="uspicon">
                    </div>
                    <div class="text-center mt-3">
                        <h6>Accessibility</h6>
                        <p>Availability of Freelancers from <br> every corner of India</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="aboutUs" data-sal="slide-right" data-sal-delay="300" data-sal-easing="ease">
            <div class="container py-5">
                <div class="d-flex flex-wrap aic">

                    <div class="col-sm-12 col-md-4">
                        <img src="{{ asset('/') }}assets/img/bg/ws.png" alt=""
                            class="imgResponsive slide-right">
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <h3 class="mb-4">Why Us</h3>
                        <p>From the start of 2020, the market size has decreased immensely but that doesn't mean
                            distinction should too.</p>
                        <p>We're aware of your needs so here at Medialancer, we present Freelance Photographers and
                            Media Support Team who are not only experienced and skilled but also budget friendly. We
                            will provide them to you without any intercessor
                            at the most affordable rates.</p>
                        <p>We are the Company who can end your pursuit of quality as we provide you with Top Freelancer
                            Photographers for your every occasion. Your quest doesn't end there because we also provide
                            Media Support to Businesses as well as Startups.</p>
                        <p>We never compromise on Quality and Durability so, trust us to be your go-to brand as we
                            capture your moments; not only with our cameras but with love and care.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="review container m_slider">
            <div class="text-center mb-5">
                <h5 class="fw-bold">What Customers says about us</h5>
            </div>
            <div class="reviewSlide">

                <div class="reviewCard m-auto">
                    <div class="d-flex aic jcc flex-column">
                        <img src="{{ asset('/') }}assets/img/photographer/a.jpg" alt="" class="review_user">
                        <h5 class="mt-3">Robert Babu</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="reviewCard m-auto">
                    <div class="d-flex aic jcc flex-column">
                        <img src="{{ asset('/') }}assets/img/photographer/b.jpg" alt="" class="review_user">
                        <h5 class="mt-3">Robert Babu</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="reviewCard m-auto">
                    <div class="d-flex aic jcc flex-column">
                        <img src="{{ asset('/') }}assets/img/photographer/c.jpg" alt="" class="review_user">
                        <h5 class="mt-3">Robert Babu</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="reviewCard m-auto">
                    <div class="d-flex aic jcc flex-column">
                        <img src="{{ asset('/') }}assets/img/photographer/d.jpg" alt="" class="review_user">
                        <h5 class="mt-3">Robert Babu</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

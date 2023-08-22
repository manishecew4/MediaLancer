@extends('layouts.user')

@section('content')
<style>
    .rating {
        flex-direction: row-reverse;
        align-items: center;
        justify-content: flex-end;
    }

    .rating:not(:checked)>input {
        position: absolute;
        appearance: none;
    }

    .rating:not(:checked)>label {
        cursor: pointer;
        font-size: 28px;
        color: #666;
    }

    .rating:not(:checked)>label:before {
        content: "★";
    }

    .rating>input:checked+label:hover,
    .rating>input:checked+label:hover~label,
    .rating>input:checked~label:hover,
    .rating>input:checked~label:hover~label,
    .rating>label:hover~input:checked~label {
        color: #e58e09;
    }

    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: #ff9e0b;
    }

    .rating>input:checked~label {
        color: #ffa723;
    }

    #gallery {
        display: grid;
        grid-template: repeat(1, 1fr)/repeat(6, 1fr);
        grid-gap: 0.5em;
        width: 100%;
        height: 100%;
    }

    #gallery>a>img {
        width: 100% !important;
        min-height: 100%;
        max-height: 150px;
        transition: all ease 1s;
        object-fit: cover;
        object-position: 50% 50%;
    }

    #gallery>a {
        overflow: hidden;
        position: relative;
        /* box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.2), 0 3px 20px 0 rgba(0, 0, 0, 0.19); */
    }
</style>
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
                        <a href="{{ asset('/') }}{{ $img->path }}" class="" data-lightbox="wrkSmpl"><img src="{{ asset('/') }}{{ $img->path }}" alt=""></a>
                        @endforeach
                        @endforeach
                    </div>

                    <div class="workSlidefor mt-1">
                        @foreach ($photo_Gr as $item)
                        @foreach ($item['image'] as $img)
                        <a class="wsf_inner"><img src="{{ asset('/') }}{{ $img->path }}" alt=""></a>
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
                            <form action="{{ route('req_booking') }}" method="post">
                                @csrf


                                <input type="hidden" name="plan" value="basic">
                                <input type="hidden" name="vendor_id" value="{{ $photo_Gr[0]['id'] }}">
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
                                    {{ $photo_Gr[0]['info']['photo']['standard'][0]['max_del_time'] }}
                                </h5>
                                <p class="mb-0">{{ $photo_Gr[0]['info']['photo']['standard'][0]['support_txt'] }}</p>
                                {{-- <p class="mb-0">High Resolution</p>
                                    <p class="mb-0">Commercial Use</p> --}}
                            </div>
                            <form action="{{ route('req_booking') }}" method="post">
                                @csrf


                                <input type="hidden" name="plan" value="standard">
                                <input type="hidden" name="vendor_id" value="{{ $photo_Gr[0]['id'] }}">
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
                                    {{ $photo_Gr[0]['info']['photo']['premium'][0]['max_del_time'] }}
                                </h5>
                                <p class="mb-0">{{ $photo_Gr[0]['info']['photo']['premium'][0]['support_txt'] }}</p>
                                {{-- <p class="mb-0">High Resolution</p>
                                    <p class="mb-0">Commercial Use</p> --}}
                            </div>
                            <form action="{{ route('req_booking') }}" method="post">
                                @csrf


                                <input type="hidden" name="plan" value="premium">
                                <input type="hidden" name="vendor_id" value="{{ $photo_Gr[0]['id'] }}">
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
                    <!-- <div class="d-flex emp_info_txt">
                        <h5>Expert in</h5>
                        <h5>Wedding Photography</h5>
                    </div> -->
                    <div class="d-flex emp_info_txt">
                        <h5>About Me</h5>
                        <h5 class="descrptn">{{$Vendor->description}}</h5>
                    </div>
                    @if (Route::has('login'))
                    @auth
                    <div class="d-flex align-items-center emp_info_txt">
                    <h5 class="mb-0">Rate Me</h5>
                    <div class="rating d-flex ">
                        <!-- <span class="d-flex empRatings aic fw-bold">{{ isset($rating_avg->avg_rating) ? round($rating_avg->avg_rating, 1) : 1 }}
                            / 5</span> -->
                        @csrf
                        <input type="hidden" name="vendor_id" value="{{ $v_id }}">
                        <input type="hidden" name="ven_id" value="">
                        <input type="radio" id="star1" name="rate" value="5" />
                        <label for="star1" title="text"></label>
                        <input type="radio" id="star2" name="rate" value="4" />
                        <label for="star2" title="text"></label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text"></label>
                        <input type="radio" id="star4" name="rate" value="2" />
                        <label for="star4" title="text"></label>
                        <input type="radio" id="star5" name="rate" value="1" />
                        <label for="star5" title="text"></label>
                    </div>
                    </div>
                    @endauth
                    @endif
                </div>
            </div>
        </div>
        <section class="workSamples mt-5">
            <div class="container">
                <div class="d-flex">
                    <h5 class="fw-bold text-secondary">Work Sample</h5>
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
                </div>
                <div class="tab-slider--container">
                    <div id="tab1" class="tab-slider--body">
                        <div class="gallery" id="gallery">
                            @foreach ($photo_Gr as $item)
                            @foreach ($item['image'] as $img)
                            <a href="{{ asset('/') }}{{ $img->path }}" data-lightbox="wrkSmplimg" class="shadow">
                                <img src="{{ asset('/') }}{{ $img->path }}" alt="" class="wrkSmplimg">
                            </a>
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div id="tab2" class="tab-slider--body wsinner">
                        <div class="gallery" id="gallery">
                            @foreach ($video_Gr as $item)
                            @foreach ($item['video'] as $vid)
                            <a href="{{ asset('/') }}{{ $vid->path }}" data-lightbox="wrkSmplimg" class="">
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
        </section>
    </section>
    <section class="mt-5 commentSection">
        <div class="container ms-5 ps-3 mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="d-flex flex-column comment-section">
                        @foreach ($comments as $comment)
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row user-info">
                                <img class="rounded-circle comment_img" src="./assets/img/user/a.jpg" width="40px me-2">
                                <div class="d-flex flex-column justify-content-start ms-2">
                                    <span class="d-block font-weight-bold h6 name">{{ $comment->username }}</span>
                                    <span class="pr">
                                    </span>
                                    <span class="date text-black-50 mt-2">Shared publicly -
                                        {{ $comment->post_on }}</span>
                                    <div class="mt-2">
                                        <p class="comment-text">{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="bg-white p-2" id="tmp-cmt">

                        </div>
                        @if (Route::has('login'))
                        @auth
                        <div class="bg-light p-2">
                            <div class="d-flex flex-row align-items-start">
                                <img class="rounded-circle comment_img" src="./assets/img/user/a.jpg" width="40px me-2">
                                <div class="col ms-3">
                                    <textarea class="form-control ml-1 shadow-none textarea" id="comment-body"></textarea>
                                    <input type="hidden" name="un" id="un" value="{{ Auth::user()->name }}">
                                    <input type="hidden" name="uid" id="uid" value="{{ Auth::user()->id }}">
                                    <div class="mt-2 text-right">
                                        <button class="btn btn_default_outline btn-sm me-3 shadow-none" type="button">Cancel</button>
                                        <button class="btn btn_default btn-sm shadow-none" id="save-comment" type="button">Post
                                            Comment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // const csrfToken = $('meta[name="csrf-token"]').attr("content");
    const csrfToken = $('input[name="_token"]').val();
    const vendor_id = $('input[name="vendor_id"]').val();


    $("input[name=rate]").on("click", function() {
        $.ajax({
            type: "POST",
            url: "{{ route('user.rating') }}",
            data: {
                rating: $(this).val(),
                vendor_id: vendor_id,
                _token: csrfToken, // Add CSRF token to data
            },
            success: function(data) {
                console.log(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
        });
    });

    // Comment
    $("#save-comment").on("click", function() {
        console.log($("#comment-body").val());
        var cmt = $("#comment-body").val();
        var un = $("#un").val();
        var uid = $("#uid").val();
        const date = new Date();
        const options = {
            year: 'numeric',
            month: 'short'
        };
        const formattedDate = date.toLocaleString('en-US', options);

        var tmp = $("#tmp-cmt");
        // tmp.empty();
        tmp.append(`
        <div class="d-flex flex-row user-info">
            <img class="rounded-circle comment_img" src="./assets/img/user/a.jpg"
                width="40px me-2">
            <div class="d-flex flex-column justify-content-start ms-2">
                <span class="d-block font-weight-bold h6 name">${un}</span>
                <span class="pr">
                </span>
                <span class="date text-black-50 mt-2">Shared publicly - ${formattedDate}</span>
                <div class="mt-2">
                    <p class="comment-text">${cmt}</p>
                </div>
            </div>
        </div>
        `);

        $.ajax({
            type: "POST",
            url: "{{ route('user.comment') }}",
            data: {
                comment: $("#comment-body").val(),
                username: un,
                user_id: uid,
                post_on: formattedDate,
                vendor_id: vendor_id,
                _token: csrfToken, // Add CSRF token to data
            },
            success: function(data) {
                console.log(data);
                $("#comment-body").val('');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
        });
    })
</script>
@endsection



{{-- <div class="d-flex flex-column justify-content-start ms-2">
    <span class="d-block font-weight-bold h6 name">Marry Andrews</span>
    <span class="pr">
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
</div> --}}
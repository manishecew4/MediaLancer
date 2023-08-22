<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/') }}assets/img/icons/camera1.png">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/slick.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/custom.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/responsive.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
    <style>
        .suggestion {
          padding: 5px;
          cursor: pointer;
        }

        .search-results {
            border: 1px solid #ccc;
            padding: 10px;
            }

            ul {
            list-style: none;
            margin: 0;
            padding: 0;
            }

            li {
            margin-bottom: 10px;
            }

            h3 {
            font-size: 18px;
            margin: 0 0 5px 0;
            }

            p {
            font-size: 14px;
            margin: 0;
            }

    </style>
</head>
<section class="main_home">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand col-4" href="{{ url('/') }}">
                <img src="{{ asset('/') }}assets/img/logo.png" alt="" style="max-width:150px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <i class="fa-solid fa-bars"></i>
            </button>
            <!-- OffCanvas Start -->
            <div class="offcanvas offcanvas-start bg-light" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <div></div>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="h-100">
                        <ul class="sideBarMenu">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('/') }}"><i
                                        class="fa-solid me-2 fa-house"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ asset('/') }}index.html#aboutUs"><i
                                        class="fa-solid me-2 fa-address-card"></i>About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/contact') }}"> <i
                                        class="fa-solid me-2 fa-headset"></i>Contact Us</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('login'))
                                    @auth
                                        <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    @else
                                        {{-- <a class="nav-link" href="javascript:void(0)" onclick="openSignin()"><i
                                                class="fa-solid me-2 fa-right-to-bracket"></i>Log in</a> --}}
                                        <a class="nav-link" href="{{ route('login') }}"><i
                                                class="fa-solid me-2 fa-right-to-bracket"></i>Log in</a>
                                        {{-- @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                        @endif --}}
                                    @endauth
                                @endif
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- OffCanvas End -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="input-group headerSearch col me-auto webview">
                    <input type="text" class="form-control" id="search-input" placeholder="Search Photographers"
                        aria-label="Search Photographers" aria-describedby="button-addon2">
                        <a class="btn" id="button-addon2" onclick="OnSearch();"><i
                            class="fa-solid fa-magnifying-glass"></i></a>
                </div>
                
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('/') }}index.html#aboutUs">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('login'))
                            @auth
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                {{-- <a class="nav-link" href="javascript:void(0)" onclick="openSignin()">Login</a> --}}
                                <a class="nav-link" href="{{ route('login') }}">Login</a>

                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif --}}
                            @endauth
                        @endif

                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div id="suggestions-container" class="mt-5 pt-1"></div>

    @yield('content')


</section>
<!-- Main Home Section End -->

<!-- Footer -->
<footer class="footer-section mt-5" style="">
    <div class="container">
        <div class="footer-cta pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="cta-text">
                            <h4>Find us</h4>
                            <span>Kolkata</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fas fa-phone"></i>
                        <div class="cta-text">
                            <h4>Call us</h4>
                            <span>1234567890</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="far fa-envelope-open"></i>
                        <div class="cta-text">
                            <h4>Mail us</h4>
                            <span>info@medialancer.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{ asset('/') }}index.html"><img
                                    src="{{ asset('/') }}assets/img/logow.png" class="img-fluid"
                                    alt="logo"></a>
                        </div>
                        <div class="footer-text">
                            <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor
                                incididuntut consec tetur adipisicing elit,Lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="footer-social-icon">
                            <span>Follow us</span>
                            <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                            <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Useful Links</h3>
                        </div>
                        <ul>
                            <li><a href="{{ asset('/') }}index.html">Home</a></li>
                            <li><a href="{{ asset('/') }}index.html#aboutUs">About us</a></li>
                            <li><a href="{{ url('/contact') }}">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Search</h3>
                        </div>
                        <div class="footer-text mb-25">
                            <p>Search Best Photographers/Videographers in your location</p>
                        </div>
                        <div class="subscribe-form">
                            <form action="#">
                                <input type="text"
                                    placeholder="Search Best Photographers/Videographers in your location">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2022, All Right Reserved Medialancer</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ************************************* Models Start****************************************************** -->
<div class="modal fade" id="signinMain" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="fp_emailLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content fp_modal ovrlay">
            <div class="modal-body pr d-flex">

                <div class="card m-auto d-flex flex-row z99 container border-0 p-0 col-sm-12 col-md-9 col-lg-7">
                    <a class="btn_close p-3" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid text-dark fa-xmark h3"></i>
                    </a>
                    <div class="col-6 loginImg d-flex jcc aic" style="background-color: #2a9d8f;">
                        <img src="{{ asset('/') }}assets/img/bg/bg.png" class="login_bkgrnd">
                    </div>

                    <div class="col p-0 log_in card" id="log_in">
                        <div class="text-center p-3 pr">
                            <div class="pr">
                                <h4 class="fw-bolder loginheader">Welcome back to</h4>
                            </div>
                            <img src="{{ asset('/') }}assets/img/logoB.png" class="mt-0"
                                style="max-width:250px">
                        </div>

                        <form class="mt-3 p-3" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="user_login_email" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="exampleInputEmail1" placeholder="Username" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="mb-4">
                                <label for="user_login_password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="exampleInputPassword1" placeholder="Password" name="password" required
                                    autocomplete="current-password">
                            </div>
                            <div class="d-flex jcsb td_none">
                                <!-- <button type="submit" class="btn btn-primary">Login</button> -->
                                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                                <a href="javascript:void(0)" onclick="openModal()">Forgot Password ?</a>
                            </div>
                            <div class="text-center">
                                <p class="mb-0">Not a member ? <a class="h5 tdn text-primary"
                                        onclick="gotoSignup()" id="gotoSignup">Signup</a></p>
                            </div>
                        </form>
                        <div class="ru_vendorWrap text-center bg_grey card_footer mt-4">
                            <p class="mb-0">Are you vendor ! Click
                                <a href="{{ asset('/') }}vendorContact.html" class="h5 tdn text-primary"
                                    onclick="ru_vendor()" id="ru_vendor">Here</a>
                            </p>
                        </div>
                    </div>

                    <div class="col p-3 sign_up" id="sign_up">
                        <div class="text-center">
                            <img src="{{ asset('/') }}assets/img/logo.png" style="max-width:250px">
                        </div>
                        <h2 class="fw-bold text-muted">Signup</h2>
                        <form action="" class="mt-5">
                            <div class="mb-4">
                                <label for="user_signup_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="user_signup_name" placeholder="">
                            </div>
                            <div class="mb-4">
                                <label for="user_signup_phone" class="form-label">Phone no.</label>
                                <input type="number" class="form-control" id="user_signup_phone" placeholder="">
                            </div>
                            <div class="mb-4">
                                <label for="user_signup_email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="user_signup_email" placeholder="">
                            </div>
                            <div class="mb-4">
                                <label for="user_signup_pass" class="form-label">Password</label>
                                <input type="password" class="form-control" id="user_signup_pass" placeholder="">
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary">Signup</button>
                            </div>
                            <div class="text-center">
                                <p class="mb-0">Already a member ? <a class="h5 tdn text-primary"
                                        onclick="gotoSignin()" id="gotoSignin">Signin</a></p>
                            </div>
                            <div class="ru_vendorWrap text-center mt-2">
                                <p class="mb-0">Register as <a class="h5 tdn text-primary" onclick="ru_vendor()"
                                        id="ru_vendor">
                                        Vendor</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Forget Password Modal -->

<div class="modal fade mt-5" id="fp_email" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="fp_emailLabel" aria-hidden="true">
    <div class="modal-dialog fp_modal col-sm-8 col-md-5 col-lg-4">
        <div class="modal-content fp_modal">
            <div class="modal-body pr">
                <a class="btn_close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></a>
                <form action="">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email Id</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary ms-auto" onclick="go_to_otp()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- OPT Modal -->
<div class="modal fade mt-5" id="otp_email" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="otp_emailLabel" aria-hidden="true">
    <div class="modal-dialog fp_modal col-sm-8 col-md-5 col-lg-4">
        <div class="modal-content fp_modal">
            <div class="modal-body pr">
                <a class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </a>
                <form action="">
                    <div class="mb-3">
                        <label for="otp_input" class="form-label">Enter OTP</label>
                        <input type="text" class="form-control" id="otp_input" placeholder="">
                    </div>
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary ms-auto"
                            onclick="go_to_newPass()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- New Pass Modal -->

<div class="modal fade mt-5" id="fp_newPass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="fp_newPassLabel" aria-hidden="true">
    <div class="modal-dialog fp_modal col-sm-8 col-md-5 col-lg-4">
        <div class="modal-content fp_modal">
            <div class="modal-body pr">
                <a class="btn_close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></a>
                <form action="">
                    <div class="mb-3">
                        <label for="new_pass" class="form-label">New Password</label>
                        <input type="text" class="form-control" id="new_pass" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="conf_new_pass" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="conf_new_pass" placeholder="">
                    </div>
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary ms-auto"
                            onclick="submit_to_newPass()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ************************************* Models End****************************************************** -->
<!-- CDNs -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}assets/js/slick.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('/') }}assets/js/custom.js"></script>
<script>
    $(document).ready(function() {
        let data = [{

        }]
        var empRating = $(".empRating").css("background-color", "orange");

        console.log(empRating);
    })
</script>
<script>
    // https://dog.ceo/api/breeds/image/random
    // fetch('https://dog.ceo/api/breeds/image/random')
    //     .then(response => response.json())
    //     .then(data => console.log(data));
</script>

<body>

</body>
<script>
    $(document).ready(function() {

        $(".test-vd").hover(
            function() {
                $(this).children("video").get(0).play();
                console.log('play');
            },
            function() {
                $(this).children("video").get(0).pause();
                console.log('pause');

                // Use if you want your video restart on hover again
                $(this).children("video").get(0).currentTime = 0;

            });
    });

</script>
<script>
    // $('#search-input').on('keyup', function() {
    //     var query = $('#search-input').val();
    //     if (query === '') {
    //         $('#suggestions-container').empty();
    //         return;
    //     }

    //     $.ajax({
    //         url: '{{route("ajax_search")}}',
    //         data: {query: query},
    //         success: function(response) {

    //         var suggestions = response.suggestions;

    //         $('#suggestions-container').empty();

    //         if (suggestions.length === 0) {
    //             var noResultsHtml = `<div class="search-results"><p>No results found</p></div>`;
    //             $('#suggestions-container').append(noResultsHtml);
    //             return;
    //         }

    //         var suggestionsHtml = `<div class="search-results"><ul>`;
    //         suggestions.forEach(function(suggestion) {
    //             console.log(suggestion.name);
    //             var url = "{{ route('user.emp_details', ['id' => 'vid']) }}";
    //             url = url.replace('vid', suggestion.id);
    //             console.log(url);

    //             suggestionsHtml += `<li><a href="${url}"><h3>${suggestion.name}</h3><p>${suggestion.description}</p></a></li><hr>`;
    //         });
    //         suggestionsHtml += `</ul></div>`;
    //         $('#suggestions-container').append(suggestionsHtml);
    //         }
    //     });
    // });

const OnSearch = async ()=>{
    var query = $('#search-input').val();
    if (query === '') {
        $('#suggestions-container').empty();
        return;
    }

    // window.location.href = '{{route("ajax_search")}}';
    // btoa(originalString);
    
    var url = '{{route("ajax_search")}}' + '?query=' + encodeURIComponent(btoa(query));
    window.location.href = url;
    // window.location.href = routeUrl;
}
</script>

</html>

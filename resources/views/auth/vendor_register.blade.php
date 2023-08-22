<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/') }}vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/') }}css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/') }}images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('/') }}images/logo.svg" alt="logo">
                            </div>
                            <h4>Vendor get started</h4>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="{{ route('login') }}"
                                        class="text-primary">Login</a>
                                </div>
                            @else
                            {{-- <h6 class="font-weight-light">Sign in to continue.</h6> --}}
                            <form class="pt-3" method="POST" action="{{ route('vendor_register') }}">
                                @csrf
                                <input type="hidden" name="type" value="2">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}" required autocomplete="name"
                                        placeholder="Full Name">

                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input id="phone" type="number" minlength="10" maxlength="10" class="form-control" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <input id="address" type="text" class="form-control" name="address"
                                        value="{{ old('address') }}" required autocomplete="address"
                                        placeholder="Address">
                                </div>
                                <div class="form-group">
                                        <select name="location" id="location" class="form-control" required>
                                            <option value="">Select Location</option>
                                            <option value="kolkata">kolkata</option>
                                            <option value="mumbai">mumbai</option>
                                            <option value="puri">puri</option>
                                            <option value="digha">digha</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <input id="landmark" type="text" class="form-control" name="landmark"
                                        value="{{ old('landmark') }}" required autocomplete="landmark"
                                        placeholder="Landmark">
                                </div>
                                <div class="form-group">
                                    <input id="pin" type="number" minlength="10" maxlength="10" class="form-control" name="pin"
                                        value="{{ old('pin') }}" required autocomplete="pin" placeholder="PIN">
                                </div>
                                <div class="form-group">
                                    <input id="description" type="text" class="form-control" name="description"
                                        value="{{ old('description') }}" required autocomplete="description"
                                        placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirm Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        {{ __('Register') }}</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <a href=""></a>
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <a href="{{ route('register') }}" class="auth-link text-black">Go
                                                Back!</a>
                                        </label>
                                    </div>
                                </div>

                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="{{ route('login') }}"
                                        class="text-primary">Login</a>
                                </div>
                            </form>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/') }}vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/') }}js/off-canvas.js"></script>
    <script src="{{ asset('/') }}js/hoverable-collapse.js"></script>
    <script src="{{ asset('/') }}js/template.js"></script>
    <script src="{{ asset('/') }}js/settings.js"></script>
    <script src="{{ asset('/') }}js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>

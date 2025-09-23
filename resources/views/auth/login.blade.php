<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-layout="vertical">


<!-- Mirrored from preview.pixeleyez.com/fabkin/html/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Sep 2025 07:52:41 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Sign In | FabKin Admin & Dashboards Template </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Admin & Dashboards Template" name="description"/>
    <meta content="Pixeleyez" name="author"/>

    <!-- layout setup -->
    <script type="module" src="assets/js/layout-setup.js"></script>

    <link rel="shortcut icon" href="assets/images/k_favicon_32x.png">
    <link rel="stylesheet" href="assets/libs/simplebar/simplebar.min.css">
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

</head>

<body>
<!-- START -->
<div>
    <img src="{{ asset('assets/images/auth/login_bg.jpg') }}" alt=""
         class="auth-bg light w-full h-full opacity-60 position-absolute top-0">
    <img src="{{ asset('assets/images/auth/auth_bg_dark.jpg') }}" alt="" class="auth-bg d-none dark">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100 py-10">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card mx-xxl-8">
                    <div class="card-body py-12 px-8">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" height="100" class="mb-4 mx-auto d-block">
                        <h6 class="mb-3 mb-8 fw-medium text-center">Sistemə daxil olun</h6>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row g-4">
                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email"
                                           placeholder="email adresinizi daxil edin" name="email" required>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Şifrə <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password"
                                           placeholder="Enter your password" name="password" required>
                                </div>
                                <div class="col-12 mt-8">
                                    <button type="submit" class="btn btn-primary w-full mb-4">Daxil olun<i
                                            class="bi bi-box-arrow-in-right ms-1 fs-16"></i></button>
                                </div>
                            </div>
                            <p class="mb-0 fw-semibold position-relative text-center fs-12">Sistemin təhlükəsizliyi üçün şifrənizi gizli saxlayın.</p>
                        </form>
                        <div class="text-center">
                        </div>
                    </div>
                </div>
                <p class="position-relative text-center fs-12 mb-0">© {{ \Carbon\Carbon::now()->format('Y') }} Pedomat. Bütün hüquqlar qorunur.</p>
            </div>
        </div>
    </div>
</div>


<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/scroll-top.init.js') }}"></script>

</body>
</html>

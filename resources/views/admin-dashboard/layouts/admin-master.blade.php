<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-layout="vertical">
@include('admin-dashboard.layouts.partials.head')
<body>
<div id="layout-wrapper">
    @include('admin-dashboard.layouts.partials.header')
    @include('admin-dashboard.layouts.partials.sidebar')
    <div class="sidebar-backdrop" id="sidebar-backdrop"></div>
    <main class="app-wrapper">
        @yield('content')
    </main>
    @include('admin-dashboard.layouts.partials.footer')
</div>
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/scroll-top.init.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/academy.init.js') }}"></script>
<script type="module" src="{{ asset('assets/js/app.js') }}"></script>
@stack('js-code')
</body>
</html>

@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100 mt-4">
                    <!--start::card-->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0"> Forum </h4>
                        <a href="{{ route('equipments.create') }}">
                            <button class="btn btn-primary"><i class="bi bi-plus-circle-dotted me-2"></i>Yeni forum mövzusu
                                əlavə et
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="accordion accordion-border-box mt-4" id="demo_accordion_main_10">

                            @foreach($forums as $forum)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                             data-bs-target="#demo_accordion_item_100" aria-expanded="true"
                                             aria-controls="demo_accordion_item_100">
                                            <div class="avatar-image avatar-lg me-3">
                                                <img class="img-fluid rounded-2" src="assets/images/avatar/avatar-3.jpg"
                                                     alt="avatar image">
                                            </div>
                                            <div>
                                                <p class="mb-0">{{ $forum->forum_subject }}</p>
                                                <p class="fs-12 mb-0 mt-1">{{ $forum->user->full_name }}</p>
                                            </div>
                                        </div>
                                    </h2>
                                    <div id="demo_accordion_item_100" class="accordion-collapse collapse"
                                         data-bs-parent="#demo_accordion_main_10">
                                        <div class="accordion-body">
                                            <strong>Frontend Development</strong> focuses on creating the visual aspects of
                                            a
                                            website or application that users interact with. This includes designing and
                                            implementing user interfaces (UI) using HTML, CSS, and JavaScript. For example,
                                            using
                                            Bootstrap to quickly style and layout responsive components can significantly
                                            streamline
                                            the development process.
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

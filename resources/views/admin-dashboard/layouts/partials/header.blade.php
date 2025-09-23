<header class="app-header" id="appHeader">
    <div class="container-fluid w-100">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <div class="d-inline-flex align-items-center gap-5">
                    <a href="index.html" class="fs-18 fw-semibold">
                        <img height="30" class="header-sidebar-logo-default d-none" alt="Logo"
                             src="{{ asset('assets/images/logo.png') }}">
                    </a>
                    <button type="button"
                            class="vertical-toggle btn btn-light-light text-muted icon-btn fs-5 rounded-pill"
                            id="toggleSidebar">
                        <i class="bi bi-arrow-bar-left header-icon"></i>
                    </button>
                    <button type="button"
                            class="horizontal-toggle btn btn-light-light text-muted icon-btn fs-5 rounded-pill d-none"
                            id="toggleHorizontal">
                        <i class="ri-menu-2-line header-icon"></i>
                    </button>
                </div>
            </div>
            <div class="flex-shrink-0 d-flex align-items-center gap-1">

                <div class="dropdown pe-dropdown-mega d-none d-md-block">
                    <button class="btn header-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell"></i>
                    </button>
                    <div class="dropdown-menu dropdown-mega-md header-dropdown-menu pe-noti-dropdown-menu p-0">
                        <div class="p-3 border-bottom">
                            <h6 class="d-flex align-items-center mb-0">Notification <span
                                    class="badge bg-success rounded-circle align-middle ms-1">4</span></h6>
                        </div>
                        <div class="p-3">
                            <div class="noti-item">
                                <img src="{{ asset('assets/images/logo-md.png') }}'" alt="" class="avatar-md">
                                <div>
                                    <a href="javascript:void(0)" class="stretched-link">
                                        <h6 class="mb-1">Item Back in Stock</h6>
                                    </a>
                                    <p class="text-muted mb-2">Today, 02:45 PM</p>
                                    <div class="p-2 bg-body-tertiary bg-opacity-50 rounded">
                                        <h6 class="mb-0 lh-base">Good news! The item you wanted is back in stock. Grab
                                            it before it’s gone again!</h6>
                                    </div>
                                </div>
                                <a href="javascript:void(0)"
                                   class="position-absolute top-10 end-0 fs-18 z-1 link link-danger"><i
                                        class="bi bi-x"></i></a>
                            </div>
                            <div class="noti-item">
                                <img src="{{ asset('assets/images/avatar/avatar-8.jpg') }}" alt="" class="avatar-md">
                                <div>
                                    <a href="javascript:void(0)" class="stretched-link">
                                        <h6 class="mb-1 text-muted"><strong
                                                class="fw-semibold text-body">Donald</strong> liked your post</h6>
                                    </a>
                                    <p class="text-muted mb-0">Friday, 11:29 PM</p>
                                </div>
                                <a href="javascript:void(0)"
                                   class="position-absolute top-10 end-0 fs-18 z-1 link link-danger"><i
                                        class="bi bi-x"></i></a>
                            </div>
                            <div class="noti-item">
                                <div
                                    class="avatar-md d-flex align-items-center justify-content-center bg-primary-subtle text-primary fs-16">
                                    <i class="bi bi-fire"></i>
                                </div>
                                <div>
                                    <a href="javascript:void(0)" class="stretched-link">
                                        <h6 class="mb-1">Birthday Reminder</h6>
                                    </a>
                                    <p class="text-muted mb-2">Tuesday, 02:45 PM</p>
                                    <div class="p-2 bg-body-tertiary bg-opacity-50 rounded">
                                        <h6 class="mb-0 lh-base">Don’t forget! It’s Emily birthday tomorrow. Send them a
                                            message!</h6>
                                    </div>
                                </div>
                                <a href="javascript:void(0)"
                                   class="position-absolute top-10 end-0 fs-18 z-1 link link-danger"><i
                                        class="bi bi-x"></i></a>
                            </div>
                            <div class="noti-item">
                                <img src="{{ asset('assets/images/avatar/avatar-5.jpg') }}" alt="" class="avatar-md">
                                <div>
                                    <a href="javascript:void(0)" class="stretched-link">
                                        <h6 class="mb-1 text-muted"><strong
                                                class="fw-semibold text-body">Richard</strong> followed you</h6>
                                    </a>
                                    <p class="text-muted mb-0">Monday, 07:14 AM</p>
                                </div>
                                <a href="javascript:void(0)"
                                   class="position-absolute top-10 end-0 fs-18 z-1 link link-danger"><i
                                        class="bi bi-x"></i></a>
                            </div>
                            <div class="noti-item">
                                <img src="{{ asset('assets/images/avatar/avatar-6.jpg') }}" alt="" class="avatar-md">
                                <div>
                                    <a href="javascript:void(0)" class="stretched-link">
                                        <h6 class="mb-1 text-muted"><strong
                                                class="fw-semibold text-body">Daniel</strong> invited you to join
                                            <strong class="fw-semibold text-body">Website Redesign</strong></h6>
                                    </a>
                                    <p class="text-muted mb-2">Thursday, 5:10 PM</p>
                                    <div class="d-flex align-items-center gap-1 flex-wrap position-relative z-1">
                                        <button class="btn btn-danger btn-sm">Decline</button>
                                        <button class="btn btn-primary btn-sm">Accept</button>
                                    </div>
                                </div>
                                <a href="javascript:void(0)"
                                   class="position-absolute top-10 end-0 fs-18 z-1 link link-danger"><i
                                        class="bi bi-x"></i></a>
                            </div>
                            <div class="noti-item">
                                <img src="{{ asset('assets/images/avatar/avatar-4.jpg') }}" alt="" class="avatar-md">
                                <div>
                                    <a href="javascript:void(0)" class="stretched-link">
                                        <h6 class="mb-1 text-muted"><strong
                                                class="fw-semibold text-body">Olivia</strong> liked your recent post
                                        </h6>
                                    </a>
                                    <p class="text-muted mb-0">Thursday 3:20 PM</p>
                                </div>
                                <a href="javascript:void(0)"
                                   class="position-absolute top-10 end-0 fs-18 z-1 link link-danger"><i
                                        class="bi bi-x"></i></a>
                            </div>
                            <div class="noti-item">
                                <img src="{{ asset('assets/images/avatar/avatar-1.jpg') }}" alt="" class="avatar-md">
                                <div>
                                    <a href="javascript:void(0)" class="stretched-link">
                                        <h6 class="mb-1 text-muted"><strong class="fw-semibold text-body">Mia</strong>
                                            shared a file in Marketing Campaign</h6>
                                    </a>
                                    <p class="text-muted mb-2">Thursday 3:20 PM</p>
                                    <div
                                        class="d-flex align-items-center gap-2 p-1 position-relative z-1 border rounded">
                                        <div
                                            class="avatar-md d-flex align-items-center rounded justify-content-center flex-shrink-0 bg-danger-subtle text-danger">
                                            <i class="bi bi-file-pdf"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <a href="javascript:void(0)">
                                                <h6 class="mb-1">Campaign_Strategy.mp4</h6>
                                            </a>
                                            <p class="mb-0 text-muted">MP4 | 14 MB</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:void(0)"
                                   class="position-absolute top-10 end-0 fs-18 z-1 link link-danger"><i
                                        class="bi bi-x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown pe-dropdown-mega d-none d-md-block">
                    <button class="header-profile-btn btn gap-1 text-start" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="header-btn btn position-relative">
                                <span
                                    class="position-absolute translate-middle badge border border-light rounded-circle bg-success"><span
                                        class="visually-hidden"></span></span>
                            </span>
                        <div class="d-none d-lg-block pe-2">
                            <span class="d-block mb-0 fs-13 fw-semibold">Cavid Şıxıyev</span>
                            <span class="d-block mb-0 fs-12 text-muted">Developer</span>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-mega-sm header-dropdown-menu p-3">
                        <div class="border-bottom pb-2 mb-2 d-flex align-items-center gap-2">
                            <img src="{{ asset('assets/images/avatar/avatar-10.jpg') }}" alt="" class="avatar-md">
                            <div>
                                <a href="javascript:void(0)">
                                    <h6 class="mb-0 lh-base">Cavid Şıxıyev</h6>
                                </a>
                                <p class="mb-0 fs-13 text-muted">chaparoglucavid@pedomat.az</p>
                            </div>
                        </div>
                        <ul class="list-unstyled mb-1 border-bottom pb-1">
                            <li><a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-person me-1"></i>
                                    Hesab məlumatları</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-gear me-1"></i>
                                    Settings</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-award me-1"></i>
                                    İzləyicilər</a></li>
                        </ul>
                        <ul class="list-unstyled mb-1 border-bottom pb-1">
                            <li><a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-clock me-1"></i>
                                    Əməliyyat tarixçəsi</a></li>
                        </ul>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item"><i
                                            class="bi bi-box-arrow-right me-1"></i> Çıxış
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

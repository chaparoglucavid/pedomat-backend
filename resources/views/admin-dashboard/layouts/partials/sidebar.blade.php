<aside class="pe-app-sidebar" id="sidebar">
        <div class="pe-app-sidebar-logo px-6 d-flex align-items-center position-relative">
            <!--begin::Brand Image-->
            <a href="{{ route('dashboard') }}" class="fs-18 fw-semibold">
                <img height="70" class="pe-app-sidebar-logo-default d-none" alt="Logo" src="{{ asset('assets/images/logo.png') }}">
                <!-- FabKin -->
            </a>
            <!--end::Brand Image-->
        </div>
        <nav class="pe-app-sidebar-menu nav nav-pills" data-simplebar id="sidebar-simplebar">
            <ul class="pe-main-menu list-unstyled">
                <li class="pe-menu-title">
                    Menu
                </li>
                <li class="pe-slide pe-has-sub">
                    <a href="{{ route('dashboard') }}" class="pe-nav-link">
                        <i class="bi bi-speedometer2 pe-nav-icon"></i>
                        <span class="pe-nav-content">Əsas səhifə</span>
                    </a>
                </li>
                <li class="pe-slide pe-has-sub">
                    <a href="{{ route('equipments.index') }}" class="pe-nav-link">
                        <i class="bi bi-pc-display pe-nav-icon"></i>
                        <span class="pe-nav-content">Cihazlar</span>
                    </a>
                </li>
                <li class="pe-slide pe-has-sub">
                    <a href="{{ route('ped-categories.index') }}" class="pe-nav-link">
                        <i class="bi bi-ui-checks-grid pe-nav-icon"></i>
                        <span class="pe-nav-content">Ped kateqoriyaları</span>
                    </a>
                </li>
                <li class="pe-slide pe-has-sub">
                    <a href="{{ route('users.index') }}" class="pe-nav-link">
                        <i class="bi bi-person-check pe-nav-icon"></i>
                        <span class="pe-nav-content">İstifadəçilər</span>
                    </a>
                </li>
                <li class="pe-slide pe-has-sub">
                    <a href="{{ route('orders.index') }}" class="pe-nav-link">
                        <i class="bi bi-receipt-cutoff pe-nav-icon"></i>
                        <span class="pe-nav-content">Sifariş tarixçəsi</span>
                    </a>
                </li>
                <li class="pe-slide pe-has-sub">
                    <a href="{{ route('payment-histories.index') }}" class="pe-nav-link">
                        <i class="bi bi-credit-card-2-front pe-nav-icon"></i>
                        <span class="pe-nav-content">Ödəniş tarixçəsi</span>
                    </a>
                </li>
                <li class="pe-slide pe-has-sub">
                    <a href="{{ route('forums.index') }}" class="pe-nav-link">
                        <i class="bi bi-chat-text pe-nav-icon"></i>
                        <span class="pe-nav-content">Forum</span>
                    </a>
                </li>

                <li class="pe-slide pe-has-sub">
                    <a href="#collapsePages" class="pe-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapsePages">
                        <i class="bi bi-sliders2 pe-nav-icon"></i>
                        <span class="pe-nav-content">Sistem tənzimləmələri</span>
                        <i class="ri-arrow-down-s-line pe-nav-arrow"></i>
                    </a>
                    <ul class="pe-slide-menu collapse" id="collapsePages">
                        <li class="slide pe-nav-content1">
                            <a href="javascript:void(0)">Pages</a>
                        </li>
                        <li class="pe-slide-item">
                            <a href="pages-starter.html" class="pe-nav-link">
                                Blank Page
                            </a>
                        </li>
                        <li class="pe-slide pe-has-sub">
                            <a href="#collapseProfile" class="pe-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseProfile">
                                <span class="pe-nav-sub-content">Profile</span>
                                <i class="ri-arrow-down-s-line pe-nav-arrow"></i>
                            </a>
                            <ul class="pe-slide-menu collapse" id="collapseProfile">
                                <li class="slide pe-nav-content1">
                                    <a href="javascript:void(0)">Profile</a>
                                </li>
                                <li class="pe-slide-item">
                                    <a href="pages-profile.html" class="pe-nav-link">
                                        Simple Page
                                    </a>
                                </li>
                                <li class="pe-slide-item">
                                    <a href="pages-profile-setting.html" class="pe-nav-link">
                                        Settings
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pe-slide pe-has-sub">
                            <a href="#collapseBlogs" class="pe-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseBlogs">
                                <span class="pe-nav-sub-content">Blogs</span>
                                <i class="ri-arrow-down-s-line pe-nav-arrow"></i>
                            </a>
                            <ul class="pe-slide-menu collapse" id="collapseBlogs">
                                <li class="slide pe-nav-content1">
                                    <a href="javascript:void(0)">Blog</a>
                                </li>
                                <li class="pe-slide-item">
                                    <a href="pages-blog-list.html" class="pe-nav-link">
                                        Blog List
                                    </a>
                                </li>
                                <li class="pe-slide-item">
                                    <a href="pages-blog-details.html" class="pe-nav-link">
                                        Blog Details
                                    </a>
                                </li>
                                <li class="pe-slide-item">
                                    <a href="pages-blog-create.html" class="pe-nav-link">
                                        Create Blog
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pe-slide-item">
                            <a href="pages-timeline.html" class="pe-nav-link">
                                Timeline
                            </a>
                        </li>
                        <li class="pe-slide-item">
                            <a href="pages-faqs.html" class="pe-nav-link">
                                FAQs
                            </a>
                        </li>
                        <li class="pe-slide-item">
                            <a href="pages-billing-subscription.html" class="pe-nav-link">
                                Billing & Subscription
                            </a>
                        </li>
                        <li class="pe-slide-item">
                            <a href="pages-pricing.html" class="pe-nav-link">
                                Pricing
                            </a>
                        </li>
                        <li class="pe-slide-item">
                            <a href="pages-gallery.html" class="pe-nav-link">
                                Gallery
                            </a>
                        </li>
                        <li class="pe-slide-item">
                            <a href="pages-sitemap.html" class="pe-nav-link">
                                Sitemap
                            </a>
                        </li>
                        <li class="pe-slide-item">
                            <a href="pages-search-result.html" class="pe-nav-link">
                                Search Results
                            </a>
                        </li>
                        <li class="pe-slide-item">
                            <a href="pages-privacy-policy.html" class="pe-nav-link">
                                Privacy Policy
                            </a>
                        </li>
                        <li class="pe-slide-item">
                            <a href="pages-terms-conditions.html" class="pe-nav-link">
                                Terms & Conditions
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </aside>

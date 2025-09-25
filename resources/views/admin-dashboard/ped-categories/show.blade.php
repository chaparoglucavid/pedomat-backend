@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-5">
                <div class="card mt-4">
                    <div class="card-body">
                        <h3> {{ $equipment->equipment_name }} </h3>
                        <h4> {{ $equipment->equipment_number }} </h4>
                        <p class="fs-16 mb-3">
                            <i class="ri-star-fill text-warning"></i>
                            <i class="ri-star-fill text-warning"></i>
                            <i class="ri-star-fill text-warning"></i>
                            <i class="ri-star-fill text-warning"></i>
                            <i class="ri-star-fill-half text-warning"></i>
                            <span class="fw-medium ms-1 fs-13">4.6
                                    <a class="text-muted ms-2" href="javascript:voide(0)">(Ümumi rəylər)</a>
                                </span>
                        </p>
                        <div class="mb-3">
                            <p class="fs-15 fw-semibold mb-1">Ünvan :</p>
                            <p class="text-muted mb-0 fs-13">{{ $equipment->current_address }}</p>
                        </div>
                        <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
                            @foreach($ped_categories as $category)
                                @php
                                    $hasCategory = $equipment->equipment_ped_stock->contains('ped_category_id', $category->id);
                                @endphp

                                <p class="mb-1 py-1 px-2 rounded-1 fs-12
                                    {{ $hasCategory ? 'text-success bg-success-subtle' : 'text-danger bg-danger-subtle' }}">
                                    <i class="{{ $hasCategory ? 'ri-checkbox-circle-fill text-success' : 'ri-close-circle-fill text-danger' }} me-1 align-middle d-inline-block"></i>
                                    {{ $category->category_name }}
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-7">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 border-end">
                                <h6 class="mb-3">Qiymətləndirmə & Rəylər</h6>
                                <h3 class="fw-semibold">
                                    {{ $rating_average ?? 0 }}
                                    <sub class="fs-12 text-muted ms-2">(5 üzərindən)</sub>
                                </h3>
                                <p class="mb-0 text-muted fs-12">
                                    <i class="ri-star-line me-1 fs-13"></i>Ümumi (23,435) reyting
                                </p>
                            </div>
                            <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12 px-3">
                                @for($i=5; $i>0; $i--)
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="fs-12 me-2 fw-semibold">{{ $i }}
                                            <i class="ri-star-fill fs-10"></i>
                                        </div>
                                        <div class="progress progress-xs flex-fill"
                                             style="stroke-dasharray: 282.6, 282.6; stroke-dashoffset: 0;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                 style="width: {{ !empty($rating_counts[$i]) ? $rating_counts[$i]*10 : 0 }}%"
                                                 aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <div class="row mt-5">
                            @forelse($equipment->equipment_reviews as $review)
                                <div class="col-12">
                                    <div
                                        class="swiper swiper-reviews swiper-initialized swiper-horizontal swiper-autoheight swiper-backface-hidden">
                                        <div class="swiper-wrapper" id="swiper-wrapper-52aa1d5cfbaec457"
                                             aria-live="polite" style="height: 180px;">
                                            <div class="swiper-slide card border shadow-none mb-0 swiper-slide-active"
                                                 role="group" aria-label="1 / 2"
                                                 style="width: 1272px; margin-right: 10px;">
                                                <div class="card-body">
                                                    <div class="d-sm-flex d-block align-items-center mb-3">
                                                        <div class="d-flex flex-fill align-items-center">
                                                            <p class="mb-0 fs-14 lh-1 fw-semibold">{{ $review->user->full_name }}
                                                                <span class="mb-0 fs-12 fw-normal ms-1">
                                                                    <i class="ri-star-s-fill text-warning align-middle lh-1 fs-10 me-1 fw-normal align-middle"></i> {{ $review->rating }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="ps-sm-0 mt-sm-0 mt-3 ps-sm-0 ps-2">
                                                            <span class="badge undefined badge bg-success">{{ \Carbon\Carbon::parse($review->created_at)->format('Y-m-d (H:i)') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-semibold mb-1">{{ $review->note }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide card border shadow-none mb-0 swiper-slide-next"
                                                 role="group" aria-label="2 / 2"
                                                 style="width: 1272px; margin-right: 10px;">
                                                <div class="card-body">
                                                    <div class="d-sm-flex d-block align-items-center mb-3">
                                                        <div class="d-flex flex-fill align-items-center">
                                                            <span class="avatar avatar-sm avatar-rounded me-2">
                                                                <img src="assets/images/avatar/avatar-2.jpg"
                                                                     class="img-fluid rounded-circle" alt="">
                                                            </span>
                                                            <p class="mb-0 fs-14 lh-1 fw-semibold">Kibra Haile
                                                                <span class="mb-0 fs-12 fw-normal ms-1">
                                                                    <i class="ri-star-s-fill text-warning align-middle lh-1 fs-10 me-1 fw-normal align-middle"></i> 4.3
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="ps-sm-0 mt-sm-0 mt-3 ps-sm-0 ps-2">
                                                            <span class="badge undefined badge bg-success">Verified Purchase</span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fw-semibold mb-1">Sleek Design, Fast Delivery,
                                                            Hassle-Free Returns!</p>
                                                        <p class="mb-0 fs-11">Lorem ipsum dolor sit amet, consectetur
                                                            adipisicing elit. Nisi cumque, laboriosam deserunt dolor
                                                            quod totam?</p>
                                                    </div>
                                                    <div class="product-images ps-0">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="products-review-images d-flex">
                                                                    <a href="javascript:voide(0)" data-discover="true">
                                                                        <img src="assets/images/product/img-02.png"
                                                                             class="avatar-lg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-xl-6 d-flex align-items-end justify-content-sm-end mt-sm-0 mt-2">
                                                                <button class="btn-wave me-2 btn btn-light btn-sm">
                                                                    Report abuse
                                                                </button>
                                                                <button class="btn btn-sm me-1 bg-primary-subtle">
                                                                    <i class="ri-thumb-up-line"></i>
                                                                </button>
                                                                <button class="btn btn-sm me-1 bg-primary-subtle">
                                                                    <i class="ri-thumb-down-line"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="swiper-notification" aria-live="assertive"
                                              aria-atomic="true"></span></div>
                                </div>
                            @empty
                                <div
                                    class="swiper swiper-reviews swiper-initialized swiper-horizontal swiper-autoheight swiper-backface-hidden">
                                    <div class="swiper-wrapper" id="swiper-wrapper-52aa1d5cfbaec457"
                                         aria-live="polite" style="height: 180px;">
                                        <div class="swiper-slide card border shadow-none mb-0 swiper-slide-active"
                                             role="group" aria-label="1 / 2"
                                             style="width: 1272px; margin-right: 10px;">
                                            <div class="card-body">
                                            <strong>
                                                Rəy əlavə edilməyib.
                                            </strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

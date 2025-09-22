@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">

        <div class="d-flex align-items-center mt-2 mb-2">
            <h6 class="mb-0 flex-grow-1">Statistik məlumatlar</h6>
            <div class="flex-shrink-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Academy</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl col-sm-6">
                <div class="card overflow-hidden">
                    <div class="card-body position-relative z-1">
                        <div class="d-flex gap-2 justify-content-between">
                            <div>
                                <span class="d-block mb-5">Cihazlar</span>
                                <h4 class="mb-4 fw-semibold">{{ $total_equipments }}</h4>
                                <div class="row">
                                    <div class="col-4">
                                        <button class="btn btn-success">
                                            {{ $total_active_equipments }}
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-danger">
                                            {{ $total_deactive_equipments }}
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-warning">
                                            {{ $total_under_repair_equipments }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="h-50px w-50px d-flex justify-content-center align-items-center bg-primary rounded-pill text-white fs-4">
                                <i class="ri-computer-fill"></i>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('assets/images/dashboard/academy-bg3.png') }}" alt=""
                         class="position-absolute bottom-0 right  h-100 w-100 object-fit-cover  opacity-5">
                </div>
            </div>
            <div class="col-xxl col-sm-6">
                <div class="card overflow-hidden">
                    <div class="card-body position-relative z-1">
                        <div class="d-flex gap-2 justify-content-between">
                            <div>
                                <span class="d-block mb-5">İstifadəçilər</span>
                                <h4 class="mb-4 fw-semibold">{{ $total_users }}</h4>
                                <p class="mb-0 fw-medium">{{ $percentage }}%<i
                                        class="bi bi-arrow-up-right text-success ms-1"></i></p>
                                <p class="mb-0 fs-12">Bu həftə qeydiyyatdan keçənlər</p>
                            </div>
                            <div
                                class="h-50px w-50px d-flex justify-content-center align-items-center bg-info rounded-pill text-white fs-4">
                                <i class="ri-user-2-fill"></i>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('assets/images/dashboard/academy-bg1.png') }}" alt=""
                         class="position-absolute bottom-0 right  h-100 w-100 object-fit-cover  opacity-5">
                </div>
            </div>

            <div class="col-xxl col-sm-6">
                <div class="card overflow-hidden">
                    <div class="card-body position-relative z-1">
                        <div class="d-flex gap-2 justify-content-between">
                            <div>
                                <span class="d-block mb-5">Ped kateqoriyaları</span>
                                <h4 class="mb-4 fw-semibold">{{ $total_ped_categories }}</h4>
                                <p class="mb-0 fw-medium">
                                    {{ $total_ped_count }}
                                </p>
                                <p class="mb-0 fs-12">Cihazlardakı cari ped sayı</p>
                            </div>
                            <div
                                class="h-50px w-50px d-flex justify-content-center align-items-center bg-secondary rounded-pill text-white fs-4">
                                <i class="ri-list-check"></i>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('assets/images/dashboard/academy-bg2.png') }}" alt=""
                         class="position-absolute bottom-0 right  h-100 w-100 object-fit-cover  opacity-5">
                </div>
            </div>
            <div class="col-xxl col-sm-6">
                <div class="card overflow-hidden">
                    <div class="card-body position-relative z-1">
                        <div class="d-flex gap-2 justify-content-between">
                            <div>
                                <span class="d-block mb-5">Sifarişlər</span>
                                <h4 class="mb-4 fw-semibold">{{ $total_orders_amount }}₼</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-success">
                                            {{ $total_used_orders_amount }}₼
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-warning">
                                            {{ $total_pending_amount }}₼
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="h-50px w-50px d-flex justify-content-center align-items-center bg-warning rounded-pill text-white fs-4">
                                <i class="ri-wallet-line"></i>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('assets/images/dashboard/academy-bg4.png') }}" alt=""
                         class="position-absolute bottom-0 right  h-100 w-100 object-fit-cover  opacity-5">
                </div>
            </div>
            <div class="col-xxl col-sm-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex gap-2 justify-content-between">
                            <div>
                                <span class="d-block mb-3">Applikasiya statistikası</span>
                                <h4 class="mb-4 fw-semibold">102</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary">
                                            56 <i class="ri-download-2-fill"></i>
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-secondary">
                                            56 <i class="ri-download-2-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="h-50px w-50px d-flex justify-content-center align-items-center bg-primary rounded-pill text-white fs-4">
                                <i class="ri-download-line"></i>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('assets/images/dashboard/academy-bg5.png') }}" alt=""
                         class="position-absolute bottom-0 right h-100 w-100 object-fit-cover opacity-5">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Tarix/Qazanc statistikası</h5>
                        </div>
                        <div id="performance"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-7">
                <div class="card courses-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Son sifarişlər</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-box table-responsive">
                            <table class="table">
                                <thead class="">
                                <tr>
                                    <th>#</th>
                                    <th>İstifadəçi</th>
                                    <th>Cihaz</th>
                                    <th>Sifariş nömrəsi</th>
                                    <th>Ped sayı</th>
                                    <th>Cəmi məbləğ</th>
                                    <th>Ödəniş metodu</th>
                                    <th>Ödəniş statusu</th>
                                    <th>Barkod statusu</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($last_orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->user->full_name }}</td>
                                        <td>{{ $order->equipment->equipment_name }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->order_qty_sum }}</td>
                                        <td>{{ $order->order_amount_sum }}₼</td>
                                        <td>
                                            <span class="badge bg-success-subtle text-success">
                                                @if($order->payment_method === 'card')
                                                    <i class="ri-bank-card-line me-1"></i> Kart
                                                @elseif($order->payment_method === 'balance')
                                                    <i class="ri-wallet-line me-1"></i> Balans
                                                @else
                                                    {{ ucfirst($order->payment_method) }}
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            @php
                                                $status = $order->payment_status;
                                                $badgeClass = 'bg-secondary text-white';
                                                $statusText = ucfirst($status);

                                                if ($status === 'pending') {
                                                    $badgeClass = 'bg-warning-subtle text-warning';
                                                } elseif ($status === 'processing') {
                                                    $badgeClass = 'bg-primary-subtle text-primary';
                                                } elseif ($status === 'completed') {
                                                    $badgeClass = 'bg-success-subtle text-success';
                                                }
                                            @endphp

                                            <span class="badge {{ $badgeClass }}">
                                                {{ $statusText }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success-subtle text-success">
                                                @if($order->barcode_status === 'used')
                                                    <i class="ri-check-double-fill me-1"></i> İstifadə edilib
                                                @elseif($order->payment_method === 'not_used')
                                                    <i class="ri-close-circle-line me-1"></i> İstifadə edilməyib
                                                @else
                                                    {{ ucfirst($order->barcode_status) }}
                                                @endif
                                            </span>
                                        </td>

                                        <td>
                                            <button class="btn btn-sm btn-info">
                                                <span>
                                                    <i class="ri-eye-2-fill"></i>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="10">
                                        <a href="#">
                                            <p class="text-center">Hamısına bax</p>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Cihaz/Sifariş statistikası</h5>
                    </div>
                    <div class="card-body">
                        <div id="course"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Cihazların texniki vəziyyəti</h5>
                    </div>
                    <div class="card-body">
                        <section class="px-5 mx-n5" data-simplebar style="max-height: 410px;">
                            @foreach($equipments as $equipment)
                                @php
                                    $value = rand(50, 100);
                                    if($value<60){
                                        $class = 'danger';
                                    } elseif($value>59 && $value<75) {
                                        $class = 'warning';
                                    } elseif($value > 74) {
                                        $class = 'success';
                                    }
                                @endphp
                                <div class="d-flex gap-4 align-items-center p-3 border rounded-3 mb-4">
                                    <div class="circular-progress circular-sm circular-progress-{{ $class }}"
                                         style="--progress: {{ $value }};">
                                        <svg class="circular-inner" viewBox="0 0 56 56">
                                            <circle class="bg-circular-progress"></circle>
                                            <circle class="fg-circular-progress"></circle>
                                        </svg>
                                        <div class="circular-text">{{ $value }}%</div>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-semibold">{{ $equipment->equipment_name }}</h6>
                                        <p>{{ $equipment->current_address }}</p>
                                        <p class="text-muted mb-0">
                                            Cari: {{ $equipment->equipment_ped_stock->sum('qty_available') }} Ped</p>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a href="javascript:void(0)" data-bs-toggle="dropdown" class="text-muted">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Cihaz statistikası</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">Düzəliş et</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">Sil</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </section>
                    </div>
                </div>

            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center card-header">
                        <h5 class="card-title mb-0">Forum</h5>
                    </div>
                    <div class="p-0 card-body">
                        <div class="table-box table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                @forelse($forums as $forum)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-4">
                                                <div
                                                    class="avatar-md bg-success-subtle text-success d-flex justify-content-center align-items-center rounded">
                                                    <i class="ri-exchange-2-line fs-5"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-medium d-block mb-1 fs-14">{{ $forum->forum_subject }}</div>
                                                    <p class="text-muted fs-12 mb-0 max-w-300px">{{ $forum->forum_content }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end"><span class="badge bg-light text-body">{{ \Carbon\Carbon::parse($forum->created_at)->format('d.m.Y H:i:s') }}</span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">
                                            <p class="text-center">
                                                Forum əlavə edilməyib
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-code')
    <script>
        var options = {
            series: [{
                data: @json($data)
            }],
            chart: {
                height: 380,
                type: 'area',
                toolbar: {
                    show: false
                }
            },
            colors: ['#007bff'],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            xaxis: {
                categories: @json($categories),
            },
            yaxis: {},
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + "₼";
                    }
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#performance"), options);
        chart.render();


        var options1 = {
            series: @json($series),
            chart: {
                type: 'bar',
                height: 380,
                stacked: true,
                toolbar: {show: false},
                zoom: {enabled: true}
            },
            colors: ['#556ee6', '#34c38f', '#f1b44c', '#f46a6a', '#6f42c1', '#e83e8c'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 0,
                    borderRadiusApplication: 'end',
                    borderRadiusWhenStacked: 'last',
                    dataLabels: {
                        total: {
                            enabled: true,
                            style: {fontSize: '13px', fontWeight: 900}
                        }
                    }
                }
            },
            xaxis: {
                categories: @json($categories),
                title: {text: 'Tarix'}
            },
            yaxis: {
                title: {text: 'Ümumi ped sifarişi'}
            },
            fill: {opacity: 1},
            legend: {position: 'bottom'},
            responsive: [{
                breakpoint: 480,
                options: {legend: {show: false}}
            }]
        };

        var chart2 = new ApexCharts(document.querySelector("#course"), options1);
        chart2.render();
    </script>
@endpush

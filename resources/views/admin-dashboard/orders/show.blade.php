@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-6 col-xl-3">
                <div class="card card-h-100">
                    <div class="card-header d-flex align-items-center gap-3">
                        <h5 class="card-title mb-0 flex-grow-1">Sifariş məlumatları</h5>
                        <div
                            class="avatar-sm bg-primary-subtle text-primary d-flex justify-content-center align-items-center rounded-2">
                            <i class="ri-discuss-line"></i>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between gap-2">
                            <h6><i class="ti ti-calendar fs-18 me-2"></i>Tarix</h6>
                            <div class="text-end">
                                <p>{{ $order->created_at }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between gap-2 mt-3">
                            <h6><i class="ti ti-credit-card fs-18 me-2"></i>Ünvan</h6>
                            <div class="text-end">
                                {{ $order->equipment->current_address }}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between gap-2 mt-3">
                            <h6 class="mb-0"><i class="ti ti-truck-delivery fs-18 me-2"></i>Barkod statusu</h6>
                            <div class="text-end">
                                <span class="badge border border-{{ config('localData.barcode_status')[$order->barcode_status]['class'] ?? 'secondary' }}
                                             text-{{ config('localData.barcode_status')[$order->barcode_status]['class'] ?? 'secondary' }}">
                                    <i class="{{ config('localData.barcode_status')[$order->barcode_status]['icon'] }}"></i>  {{ config('localData.barcode_status')[$order->barcode_status]['text'] }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-h-100">
                    <div class="card-header d-flex align-items-center gap-3">
                        <h5 class="card-title mb-0 flex-grow-1">İstifadəçi məlumatları</h5>
                        <div
                            class="avatar-sm bg-primary-subtle text-primary d-flex justify-content-center align-items-center rounded-2">
                            <i class="ri-id-card-line"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between gap-2">
                            <h6><i class="ti ti-file-invoice f-s-18 me-2"></i>Ad soyad</h6>
                            <div class="text-end">
                                <p>{{ $order->user->full_name }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between gap-2 mt-3">
                            <h6><i class="ti ti-mail f-s-18 me-2"></i>Email</h6>
                            <div class="text-end">
                                <p>{{ $order->user->email }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between gap-2 mt-3">
                            <h6 class="mb-0"><i class="ti ti-device-mobile f-s-18 me-2"></i>Əlaqə nömrəsi</h6>
                            <div class="text-end">
                                <p class="mb-0">{{ $order->user->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-h-100">
                    <div class="card-header d-flex align-items-center gap-3">
                        <h5 class="card-title mb-0 flex-grow-1">Sifariş haqqında</h5>
                        <div
                            class="avatar-sm bg-primary-subtle text-primary d-flex justify-content-center align-items-center rounded-2">
                            <i class="ri-printer-line"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between gap-2">
                            <h6><i class="ti ti-file-invoice f-s-18 me-2"></i>Sifariş nömrəsi</h6>
                            <div class="text-end">
                                <p> {{ $order->order_number }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between gap-2 mt-3">
                            <h6><i class="ti ti-mail f-s-18 me-2"></i>Avadanlıq nömrəsi</h6>
                            <div class="text-end">
                                <p>{{ $order->equipment->equipment_number }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between gap-2 mt-3">
                            <h6 class="mb-0"><i class="ti ti-truck-delivery f-s-18 me-2"></i>İnvoys</h6>
                            <div class="text-end">
                                <p class="mb-0">invoice_120101030.pdf</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center gap-3">
                        <h5 class="card-title mb-0 flex-grow-1">Ödəniş məlumatları</h5>
                        <div
                            class="avatar-sm bg-primary-subtle text-primary d-flex justify-content-center align-items-center rounded-2">
                            <i class="ri-secure-payment-line"></i></div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Əməliyyat nömrəsi:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">#QLR5456465</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Ödəniş:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                @if($order->payment_method === 'card')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                         fill="blue" class="bi bi-credit-card" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                                        <path
                                            d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                         fill="orange" class="bi bi-wallet-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542s.987-.254 1.194-.542C9.42 6.644 9.5 6.253 9.5 6a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2z"/>
                                        <path
                                            d="M16 6.5h-5.551a2.7 2.7 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5s-1.613-.412-2.006-.958A2.7 2.7 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5z"/>
                                    </svg>
                                @endif
                                <span class="badge border border-{{ config('localData.order_payment_status')[$order->payment_status]['class'] ?? 'secondary' }}
                                                 text-{{ config('localData.order_payment_status')[$order->payment_status]['class'] ?? 'secondary' }}">
                                        {{ config('localData.order_payment_status')[$order->payment_status]['text'] }}
                                    </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Kart adı:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">{{ $order->user->full_name }}</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Kart nömrəsi:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">xxxx xxxx xxxx 1100</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Ümumi sifariş məbləği:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">{{ $order->order_amount_sum }} AZN</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">{{ $order->order_number }}</h5>
                            <div class="flex-shrink-0">
                                <a href="javascript:void(0)" class="btn btn-success btn-sm"><i
                                        class="ri-download-2-fill align-middle me-1"></i> İnvoys endir</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-box">
                            <table class="table table-borderless">
                                <thead class="border-bottom">
                                <tr>
                                    <th>Kateqoriya</th>
                                    <th>Ədəd</th>
                                    <th>Qiymət (vahid)</th>
                                    <th>Ümumi qiymət</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->order_details as $detail)

                                    <tr>
                                        <td>
                                            <div class="d-flex gap-3 align-items-center">
                                                <div
                                                    class="h-56px w-56px d-flex justify-content-center align-items-center p-1 bg-light-subtle rounded">

                                                </div>
                                                <div>
                                                    <h6 class="mb-2">{{ $detail->ped_category->category_name }}</h6>
                                                    <div class="d-flex align-items-center">
                                                        <p class="text-muted mb-0 fs-13 fw-medium pe-3 me-3 border-end">
                                                            {{ $detail->ped_category->reason_for_use }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $detail->qty }} ədəd
                                        </td>
                                        <td>{{ $detail->unit_price }} AZN</td>
                                        <td>{{ $detail->total_price }} AZN</td>
                                    </tr>
                                @endforeach
                                <tr class="total">
                                    <td colspan="3"></td>
                                    <td class="fw-semibold">Ümumi ped:</td>
                                    <td>"{{ $order->order_qty_sum }}"</td>
                                </tr>
                                <tr class="total">
                                    <td colspan="3"></td>
                                    <td class="fw-semibold">Sifariş məbləği:</td>
                                    <td>{{ $order->order_amount_sum }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="fw-semibold">Vergi:</td>
                                    <td>0</td>
                                </tr>
                                <tr class="total">
                                    <td colspan="3"></td>
                                    <td class="fw-semibold">Cəmi məbləğ:</td>
                                    <td>{{ $order->order_amount_sum }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card card-h-100">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">Sifariş izləmə</h5>
                            <div
                                class="avatar-sm bg-primary-subtle text-primary d-flex justify-content-center align-items-center rounded-2">
                                <i class="ri-truck-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="timeline2 profile-timeline">
                            <ul>
                                <li class="card border-0 box">
                                    <span
                                        class="h-28px w-28px d-flex justify-content-center align-items-center text-white"><i
                                            class="ri-shopping-bag-line"></i></span>
                                    <div class="title">15 Dec 2024 <span
                                            class="badge bg-primary float-end">Order Placed</span></div>
                                    <div class="sub-title">Order successfully placed</div>
                                    <div class="info text-muted">Order placed by Austin Ninus</div>
                                </li>
                                <li class="card border-0 box">
                                    <span
                                        class="h-28px w-28px d-flex justify-content-center align-items-center text-white"><i
                                            class="ri-inbox-unarchive-line"></i></span>
                                    <div class="title">15 Dec 2024 <span
                                            class="badge bg-secondary float-end">Packed</span></div>
                                    <div class="sub-title">Order packed</div>
                                    <div class="info text-muted">Collected by Suguna Enterprises</div>
                                </li>
                                <li class="card border-0 box">
                                    <span
                                        class="h-28px w-28px d-flex justify-content-center align-items-center text-white"><i
                                            class="ri-truck-line"></i></span>
                                    <div class="title">16 Dec 2024 <span
                                            class="badge bg-warning float-end">Shipping</span></div>
                                    <div class="sub-title">On the way</div>
                                    <div class="info text-muted">Order picked and en route</div>
                                </li>
                                <li class="card border-0 box">
                                    <span
                                        class="h-28px w-28px d-flex justify-content-center align-items-center text-white"><i
                                            class="ri-e-bike-2-line"></i></span>
                                    <div class="title">17 Dec 2024 <span class="badge bg-info float-end">Delivery</span>
                                    </div>
                                    <div class="sub-title">Delivery in progress</div>
                                    <div class="info text-muted">Your package is out for delivery</div>
                                </li>
                                <li class="card border-0 box">
                                    <span
                                        class="h-28px w-28px d-flex justify-content-center align-items-center text-white"><i
                                            class="ri-hand-coin-line"></i></span>
                                    <div class="title">17 Dec 2024 <span
                                            class="badge bg-success float-end">Delivered</span></div>
                                    <div class="sub-title">Order completed</div>
                                    <div class="info text-muted">Successfully delivered</div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

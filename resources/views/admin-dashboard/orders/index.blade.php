@extends('admin-dashboard.layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100 mt-4">
                    <!--start::card-->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0"> İstifadəçilər </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" data-simplebar>
                            <table class="table text-nowrap table-borderless mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Cihaz</th>
                                    <th scope="col">İstifadəçi</th>
                                    <th scope="col">Sifariş nömrəsi</th>
                                    <th scope="col">Ümumi ped sayı</th>
                                    <th scope="col">Sifarişin ümumi məbləği</th>
                                    <th scope="col">Ödəniş metodu</th>
                                    <th scope="col">Ödəniş statusu</th>
                                    <th scope="col">Barkod</th>
                                    <th scope="col">Barkod statusu</th>
                                    <th scope="col">Əməliyyatlar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-medium">{{ $order->equipment->equipment_number }}</td>
                                        <td class="fw-medium">{{ $order->user->full_name }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->order_qty_sum }}</td>
                                        <td>{{ $order->order_amount_sum }} AZN</td>
                                        <td>
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

                                        </td>
                                        <td>
                                            <span class="badge border border-{{ config('localData.order_payment_status')[$order->payment_status]['class'] ?? 'secondary' }}
                                                         text-{{ config('localData.order_payment_status')[$order->payment_status]['class'] ?? 'secondary' }}">
                                                {{ config('localData.order_payment_status')[$order->payment_status]['text'] }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ $order->barcode }}
                                        </td>
                                        <td>
                                            <span class="badge border border-{{ config('localData.barcode_status')[$order->barcode_status]['class'] ?? 'secondary' }}
                                                         text-{{ config('localData.barcode_status')[$order->barcode_status]['class'] ?? 'secondary' }}">
                                                <i class="{{ config('localData.barcode_status')[$order->barcode_status]['icon'] }}"></i>  {{ config('localData.barcode_status')[$order->barcode_status]['text'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-light-primary icon-btn" type="button"
                                                        id="actionMenu{{ $order->id }}" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                    <i class="ri-more-2-line fw-semibold fs-16"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="actionMenu{{ $order->id }}">
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="{{ route('users.edit', encrypt($order->id)) }}">
                                                            <i class="ri-edit-2-line"></i>Düzəliş et
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="{{ route('users.show', encrypt($order->id)) }}">
                                                            <i class="ri-eye-line"></i>Ətraflı bax
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('users.destroy', encrypt($order->id)) }}"
                                                              method="POST"
                                                              onsubmit="return confirm('İstifadəçini silmək istədiyinizə əminsinizmi?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="ri-delete-bin-line"></i>Sil
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10">
                                            <p class="text-center">Sifariş daxil edilməyib</p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- end:: Borderedless Table -->
                    </div>
                </div>
                <!--end::card-->
            </div>
        </div>
    </div>
@endsection

@extends('admin-dashboard.layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100 mt-4">
                    <!--start::card-->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0"> Əməliyyat tarixçəsi </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" data-simplebar>
                            <table class="table text-nowrap table-borderless mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">İstifadəçi</th>
                                    <th scope="col">Əməliyyat nömrəsi</th>
                                    <th scope="col">Məbləğ</th>
                                    <th scope="col">Ödəniş metodu</th>
                                    <th scope="col">Əməliyyat tipi</th>
                                    <th scope="col">Tarix</th>
                                    <th scope="col">Əməliyyatlar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($transaction_histories as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-medium">{{ $item->user->full_name }}</td>
                                        <td>{{ $item->transaction_number }}</td>
                                        <td>{{ $item->amount }} AZN</td>
                                        <td>{{ $item->payment_via }} </td>
                                        <td>{{ $item->transaction_type }} </td>
                                        <td>{{ $item->created_at }} </td>
                                        <td>
                                            <div class="hstack gap-2">
                                                @if(!is_null($item->order_id))
                                                    <a href="{{ route('orders.show', $item->order_id) }}" class="btn btn-primary btn-sm">Sifarişi göstər</a>
                                                @endif
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

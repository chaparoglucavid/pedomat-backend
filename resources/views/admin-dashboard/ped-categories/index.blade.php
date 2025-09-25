@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100 mt-4">
                    <!--start::card-->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0"> Kateqoriyalar </h4>
                        <a href="{{ route('ped-categories.create') }}">
                            <button class="btn btn-primary"><i class="bi bi-plus-circle-dotted me-2"></i>Yeni kateqoriya əlavə et</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" data-simplebar>
                            <table class="table text-nowrap table-borderless mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Kateqoriya adı</th>
                                    <th scope="col">İstifadə məqsədi</th>
                                    <th scope="col">Qiymət (ədəd)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Əməliyyatlar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($ped_categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-medium">{{$category->category_name }}</td>
                                        <td>
                                            {{ $category->reason_for_use }}
                                        </td>
                                        <td>
                                            {{ $category->unit_price }}
                                        </td>
                                        <td>
                                            <span class="badge border border-{{ config('localData.ped_category_status')[$category->status]['class'] }} text-{{ config('localData.ped_category_status')[$category->status]['class'] }}">{{ config('localData.ped_category_status')[$category->status]['text'] }}</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-light-primary icon-btn" type="button"
                                                        id="actionMenu1" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                    <i class="ri-more-2-line fw-semibold fs-16"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="actionMenu1">
                                                    <li><a class="dropdown-item" href="{{ route('ped-categories.edit', encrypt($category->id)) }}"><i
                                                                class="ri-edit-2-line"></i>Düzəliş et</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('ped-categories.show', encrypt($category->id)) }}"><i
                                                                class="ri-eye-line"></i>Ətraflı bax</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0)"><i
                                                                class="ri-delete-bin-line"></i>Sil</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="8">
                                        <p class="text-center">
                                            Cihaz əlavə edilməyib
                                        </p>
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

@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100 mt-4">
                    <!--start::card-->
                    <div class="card-header">
                        <h4 class="card-title mb-0"> Cihazlar </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" data-simplebar>
                            <table class="table text-nowrap table-borderless mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">Cihaz nömrəsi</th>
                                    <th scope="col">Cihaz adı</th>
                                    <th scope="col">Ümumi tutum</th>
                                    <th scope="col">Cari ped</th>
                                    <th scope="col">Cari batareya</th>
                                    <th scope="col">Ünvan</th>
                                    <th scope="col">Cihaz statusu</th>
                                    <th scope="col">Əməliyyatlar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($equipments as $equipment)
                                    <tr>
                                        <td class="fw-medium">{{$equipment->equipment_number }}</td>
                                        <td>
                                            {{ $equipment->equipment_name }}
                                        </td>
                                        <td>{{ $equipment->general_capacity }}</td>
                                        <td>{{ $equipment->total_qty_available ?? 0 }}</td>
                                        <td>
                                            <i class="ri-checkbox-circle-line align-middle text-success"></i>
                                            {{ rand(50, 100) }}%
                                        </td>
                                        <td>
                                            {{ $equipment->current_address }}
                                        </td>
                                        <td>
                                            <span class="badge border border-{{ config('localData.equipment_status')[$equipment->equipment_status]['class'] }} text-{{ config('localData.equipment_status')[$equipment->equipment_status]['class'] }}">{{ config('localData.equipment_status')[$equipment->equipment_status]['text'] }}</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-light-primary icon-btn" type="button"
                                                        id="actionMenu1" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                    <i class="ri-more-2-line fw-semibold fs-16"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="actionMenu1">
                                                    <li><a class="dropdown-item" href="javascript:void(0)"><i
                                                                class="ri-edit-2-line"></i>Düzəliş et</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0)"><i
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

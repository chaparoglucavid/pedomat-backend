@extends('admin-dashboard.layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100 mt-4">
                    <!--start::card-->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0"> İstifadəçilər </h4>
                        <a href="{{ route('users.create') }}">
                            <button class="btn btn-primary">
                                <i class="bi bi-plus-circle-dotted me-2"></i>Yeni istifadəçi əlavə et
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" data-simplebar>
                            <table class="table text-nowrap table-borderless mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Ad Soyad</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefon</th>
                                    <th scope="col">Doğum tarixi</th>
                                    <th scope="col">Balans</th>
                                    <th scope="col">Tip</th>
                                    <th scope="col">Sistem statusu</th>
                                    <th scope="col">Əməliyyatlar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-medium">{{ $user->full_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone ?? '-' }}</td>
                                        <td>{{ $user->birthdate ?? '-' }}</td>
                                        <td>{{ number_format($user->user_current_balance, 2) }} ₼</td>
                                        <td>
                                            <span class="badge bg-info">{{ ucfirst($user->type) }}</span>
                                        </td>
                                        <td>
                                            <span class="badge border border-{{ config('localData.user_system_status')[$user->system_status]['class'] ?? 'secondary' }}
                                                         text-{{ config('localData.user_system_status')[$user->system_status]['class'] ?? 'secondary' }}">
                                                {{ config('localData.user_system_status')[$user->system_status]['text'] ?? $user->system_status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-light-primary icon-btn" type="button"
                                                        id="actionMenu{{ $user->id }}" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                    <i class="ri-more-2-line fw-semibold fs-16"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="actionMenu{{ $user->id }}">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('users.edit', encrypt($user->id)) }}">
                                                            <i class="ri-edit-2-line"></i>Düzəliş et
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('users.show', encrypt($user->id)) }}">
                                                            <i class="ri-eye-line"></i>Ətraflı bax
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('users.destroy', encrypt($user->id)) }}" method="POST" onsubmit="return confirm('İstifadəçini silmək istədiyinizə əminsinizmi?')">
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
                                            <p class="text-center">İstifadəçi əlavə edilməyib</p>
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

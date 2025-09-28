@extends('admin-dashboard.layouts.admin-master')
@section('content')
<div class="container-fluid">
            <div class="card overflow-hidden mt-4">
                <div class="mt-2">
                    <div class="card-body p-5 mt-4">
                        <div class="d-flex flex-wrap align-items-start gap-5">
                            <div class="mt-n12 flex-shrink-0">
                                <div class="position-relative d-inline-block">
                                    <span class="position-absolute profile-dot bg-success rounded-circle">
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="mb-5">
                                    <h5 class="mb-1">{{ $user->full_name }} <i class="bi bi-patch-check-fill fs-16 ms-1 text-info"></i></h5>
                                </div>
                                <div class="w-100 border-dashed border border-1">
                                    <div class="p-4 d-flex">
                                        <div class="d-flex flex-column justify-content-center gap-1 w-208px text-center border-end border-dark border-opacity-20">
                                            <h5 class="mb-0 lh-1">{{ $user->orders->count()}}</h5>
                                            <span class="text-muted lh-sm fs-12">Ümumi sifarişlər</span>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center gap-1 w-208px text-center border-end border-dark border-opacity-20">
                                            <h5 class="mb-0 lh-1">{{ $user->orders->sum('order_amount_sum') }} AZN</h5>
                                            <span class="text-muted lh-sm fs-12">Ümumi sifariş məbləği</span>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center gap-1 w-208px text-center border-end border-dark border-opacity-20">
                                            <h5 class="mb-0 lh-1">{{ $user->orders()->where('barcode_status', 'used')->count() }}</h5>
                                            <span class="text-muted lh-sm fs-12">İstifadə edilmiş sifarişlər</span>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center gap-1 w-208px text-center border-end border-dark border-opacity-20">
                                            <h5 class="mb-0 lh-1">{{ $user->orders()->where('barcode_status', 'not_used')->count() }}</h5>
                                            <span class="text-muted lh-sm fs-12">Aktiv sifarişlər</span>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center gap-1 w-208px text-center border-end border-dark border-opacity-20">
                                            <h5 class="mb-0 lh-1">{{ $user->user_current_balance }} AZN</h5>
                                            <span class="text-muted lh-sm fs-12">Cari balans</span>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center gap-1 w-208px text-center border-end border-dark border-opacity-20">
                                            <h5 class="mb-0 lh-1">{{ $user->equipment_reviews->count() }} </h5>
                                            <span class="text-muted lh-sm fs-12">Cihaz haqqında ümumi rəy</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-5 mt-2">
                                    <div class="col-md-4 col-xl-3">
                                        <div class="d-flex gap-2">
                                            <i class="bi bi-mailbox fs-16"></i>
                                            <p class="text-muted mb-2">Email</p>
                                        </div>
                                        <h6 class="mb-0">{{ $user->email}}</h6>
                                    </div>
                                    <div class="col-md-4 col-xl-3">
                                        <div class="d-flex gap-2">
                                            <i class="bi bi-telephone fs-16"></i>
                                            <p class="text-muted mb-2">Əlaqə nömrəsi</p>
                                        </div>
                                        <h6 class="mb-0">{{ $user->phone }}</h6>
                                    </div>
                                    <div class="col-md-4 col-xl-3">
                                        <div class="d-flex gap-2">
                                            <i class="bi bi-calendar fs-16"></i>
                                            <p class="text-muted mb-2">Doğum günü</p>
                                        </div>
                                        <h6 class="mb-0">{{ $user->birthdate }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-6">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">Hesab</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="information-tab" data-bs-toggle="tab" data-bs-target="#information-tab-pane" type="button" role="tab" aria-controls="information-tab-pane" aria-selected="false" tabindex="-1">Şəxsi məlumatlar</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="row">
                                <div class="col-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header align-items-center">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="card-action-title mb-0">Əməliyyat tarixçəsi</h5>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="timeline2">
                                                <ul>
                                                    <li class="card border-0 box">
                                                        <span></span>
                                                        <div class="title">Graphic Designer</div>
                                                        <div class="sub-title">Figma</div>
                                                        <div class="info">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</div>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <span class="text-muted fs-13"><i class="ri ri-time-fill me-1"></i>Jan 2020 - 2022</span>
                                                            <span class="text-muted fs-13"><i class="ri ri-mac-fill me-1"></i>Canada, USA</span>
                                                        </div>
                                                    </li>
                                                    <li class="card border-0 box">
                                                        <span></span>
                                                        <div class="title">UI/UX Designer</div>
                                                        <div class="sub-title">Figma</div>
                                                        <div class="info">Available the majority have suffered alteration in some form, by injected humour</div>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <span class="text-muted fs-13"><i class="ri ri-time-fill me-1"></i>Jan 2022 - 2023</span>
                                                            <span class="text-muted fs-13"><i class="ri ri-mac-fill me-1"></i>Canada, USA</span>
                                                        </div>
                                                    </li>
                                                    <li class="card border-0 box">
                                                        <span></span>
                                                        <div class="title">FrontEnd Designer</div>
                                                        <div class="sub-title">Bootstrap</div>
                                                        <div class="info">Many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</div>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <span class="text-muted fs-13"><i class="ri ri-time-fill me-1"></i>Jan 2024 - 2025</span>
                                                            <span class="text-muted fs-13"><i class="ri ri-mac-fill me-1"></i>Canada, USA</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="information-tab-pane" role="tabpanel" aria-labelledby="information-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body p-6">
                                    <form action="{{ route('users.update', encrypt($user->id)) }}" method="POST" class="py-4">
                                        @csrf
                                        @method('PUT')
                                        <div class="row g-5">

                                            <!-- Full Name -->
                                            <div class="col-lg-4">
                                                <label for="full_name" class="form-label">Ad Soyad<span class="text-danger ms-1">*</span></label>
                                                <input type="text" name="full_name" id="full_name" class="form-control"
                                                    placeholder="Ad Soyad daxil edin"
                                                    value="{{ old('full_name', $user->full_name) }}" required>
                                            </div>

                                            <!-- Email -->
                                            <div class="col-lg-4">
                                                <label for="email" class="form-label">Email<span class="text-danger ms-1">*</span></label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    placeholder="example@gmail.com"
                                                    value="{{ old('email', $user->email) }}" required>
                                            </div>

                                            <!-- Phone -->
                                            <div class="col-lg-4">
                                                <label class="form-label" for="phone">Telefon</label>
                                                <input type="text" name="phone" id="phone" class="form-control"
                                                    placeholder="+994501234567"
                                                    value="{{ old('phone', $user->phone) }}">
                                            </div>

                                            <!-- Birthdate -->
                                            <div class="col-lg-4">
                                                <label class="form-label" for="birthdate">Doğum tarixi</label>
                                                <input type="date" name="birthdate" id="birthdate" class="form-control"
                                                    value="{{ old('birthdate', $user->birthdate) }}">
                                            </div>

                                            <!-- Password -->
                                            <div class="col-lg-4">
                                                <label for="password" class="form-label">Şifrə (dəyişmək istəsəniz doldurun)</label>
                                                <input type="password" name="password" id="password" class="form-control"
                                                    placeholder="Yeni şifrə daxil edin">
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="col-lg-4">
                                                <label for="password_confirmation" class="form-label">Şifrə təkrarı</label>
                                                <input type="password" name="password_confirmation" id="password_confirmation"
                                                    class="form-control" placeholder="Yeni şifrə təkrar">
                                            </div>

                                            <!-- Activity Status -->
                                            <div class="col-lg-4">
                                                <label for="activity_status" class="form-label">Aktivlik Statusu</label>
                                                <select name="activity_status" id="activity_status" class="form-select">
                                                    <option value="active" {{ old('activity_status', $user->activity_status) == 'active' ? 'selected' : '' }}>Aktiv</option>
                                                    <option value="inactive" {{ old('activity_status', $user->activity_status) == 'inactive' ? 'selected' : '' }}>Deaktiv</option>
                                                </select>
                                            </div>

                                            <!-- System Status -->
                                            <div class="col-lg-4">
                                                <label for="system_status" class="form-label">Sistem Statusu</label>
                                                <select name="system_status" id="system_status" class="form-select">
                                                    <option value="verified" {{ old('system_status', $user->system_status) == 'verified' ? 'selected' : '' }}>Təsdiqlənib</option>
                                                    <option value="unverified" {{ old('system_status', $user->system_status) == 'unverified' ? 'selected' : '' }}>Təsdiqlənməyib</option>
                                                    <option value="banned" {{ old('system_status', $user->system_status) == 'banner' ? 'selected' : '' }}>Ban edilib</option>
                                                    <option value="deactivated" {{ old('system_status', $user->system_status) == 'blocked' ? 'selected' : '' }}>Hesab dondurulub</option>
                                                </select>
                                            </div>

                                            <!-- User Balance -->
                                            <div class="col-lg-4">
                                                <label for="user_current_balance" class="form-label">Cari balans</label>
                                                <input type="number" step="0.01" name="user_current_balance" id="user_current_balance"
                                                    class="form-control"
                                                    value="{{ old('user_current_balance', $user->user_current_balance) }}">
                                            </div>

                                            <!-- Type -->
                                            <div class="col-lg-4">
                                                <label for="type" class="form-label">İstifadəçi Tipi</label>
                                                <select name="type" id="type" class="form-select">
                                                    <option value="user" {{ old('type', $user->type) == 'user' ? 'selected' : '' }}>İstifadəçi</option>
                                                    <option value="admin" {{ old('type', $user->type) == 'admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="moderator" {{ old('type', $user->type) == 'moderator' ? 'selected' : '' }}>Moderator</option>
                                                </select>
                                            </div>

                                            <!-- Buttons -->
                                            <div class="col-lg-12 d-flex justify-content-end gap-2 flex-shrink-0 mt-8">
                                                <a href="{{ route('users.index') }}" class="btn btn-light-dark text-body">Geri</a>
                                                <button type="submit" class="btn btn-primary">Yadda saxla</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
@endsection
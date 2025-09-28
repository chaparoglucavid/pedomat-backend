@extends('admin-dashboard.layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-h-100 mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Yeni İstifadəçi</h4>
                        <a href="{{ route('users.index') }}">
                            <button class="btn btn-danger">
                                <i class="bi bi-arrow-90deg-left me-2"></i>Geri qayıt
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="full_name">Ad Soyad</label>
                                    <input type="text" id="full_name" name="full_name" class="form-control"
                                           value="{{ old('full_name') }}"
                                           placeholder="Ad və Soyadı daxil edin">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                           value="{{ old('email') }}"
                                           placeholder="Email daxil edin">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="phone">Telefon</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                           value="{{ old('phone') }}"
                                           placeholder="Telefon nömrəsi">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="birthdate">Doğum tarixi</label>
                                    <input type="date" id="birthdate" name="birthdate" class="form-control"
                                           value="{{ old('birthdate') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="user_current_balance">Cari balans</label>
                                    <input type="number" step="0.01" id="user_current_balance" name="user_current_balance"
                                           class="form-control"
                                           value="{{ old('user_current_balance', 0.00) }}"
                                           placeholder="0.00">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="type">Tip</label>
                                    <select class="form-select" id="type" name="type">
                                        <option value="user" {{ old('type') == 'user' ? 'selected' : '' }}>İstifadəçi</option>
                                        <option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="moderator" {{ old('type') == 'moderator' ? 'selected' : '' }}>Moderator</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="activity_status">Aktivlik statusu</label>
                                    <select class="form-select" id="activity_status" name="activity_status">
                                        <option value="active" {{ old('activity_status') == 'active' ? 'selected' : '' }}>Aktiv</option>
                                        <option value="inactive" {{ old('activity_status') == 'inactive' ? 'selected' : '' }}>Deaktiv</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="system_status">Sistem statusu</label>
                                    <select class="form-select" id="system_status" name="system_status">
                                        <option value="verified" {{ old('system_status') == 'verified' ? 'selected' : '' }}>Təsdiqlənməyib</option>
                                        <option value="unverified" {{ old('system_status') == 'unverified' ? 'selected' : '' }}>Təsdiqlənib</option>
                                        <option value="blocked" {{ old('system_status') == 'banned' ? 'selected' : '' }}>Ban edilib</option>
                                        <option value="blocked" {{ old('system_status') == 'deactivated' ? 'selected' : '' }}>Hesab dondurulub</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="password">Şifrə</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                           placeholder="Şifrə daxil edin">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="password_confirmation">Şifrə (təkrar)</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                                           placeholder="Şifrəni təkrar daxil edin">
                                </div>
                            </div>

                            <div class="mt-4 d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-check me-2"></i>Yadda saxla
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

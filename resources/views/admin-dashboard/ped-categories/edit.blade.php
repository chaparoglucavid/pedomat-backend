@extends('admin-dashboard.layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-h-100 mt-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Cihaz məlumatlarını redaktə et</h4>
                            <a href="{{ route('equipments.index') }}">
                                <button class="btn btn-danger"><i class="bi bi-arrow-90deg-left me-2"></i>Cihazlar</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('equipments.update', encrypt($equipment->id)) }}">
                            @csrf
                            @method('PUT')
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="equipment-name">Cihaz adı</label>
                                    <input placeholder="Cihaz adını daxil edin" name="equipment_name" type="text"
                                           id="equipment-name" class="form-control"
                                           value="{{ old('equipment_name', $equipment->equipment_name) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="equipment-number">Cihaz nömrəsi</label>
                                    <input placeholder="Cihaz nömrəsini daxil edin" name="equipment_number" type="text"
                                           id="equipment-number" class="form-control"
                                           value="{{ old('equipment_number', $equipment->equipment_number) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="general-capacity">Ümumi tutum</label>
                                    <input placeholder="Məs: 20" name="general_capacity" type="number"
                                           id="general-capacity" class="form-control"
                                           value="{{ old('general_capacity', $equipment->general_capacity) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="equipment-status">Cihaz statusu</label>
                                    <select class="form-select" id="equipment-status" name="equipment_status">
                                        <option value="" disabled>Seçin</option>
                                        <option value="active" {{ old('equipment_status', $equipment->equipment_status) == 'active' ? 'selected' : '' }}>Aktiv</option>
                                        <option value="inactive" {{ old('equipment_status', $equipment->equipment_status) == 'inactive' ? 'selected' : '' }}>Deaktiv</option>
                                        <option value="maintenance" {{ old('equipment_status', $equipment->equipment_status) == 'maintenance' ? 'selected' : '' }}>Servisdə</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label" for="current-address">Cari ünvan</label>
                                    <input placeholder="Cari ünvanı daxil edin" name="current_address" type="text"
                                           id="current-address" class="form-control"
                                           value="{{ old('current_address', $equipment->current_address) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="longitude">Uzunluq (Longitude)</label>
                                    <input placeholder="Məs: 49.8671" name="longitude" type="text"
                                           id="longitude" class="form-control"
                                           value="{{ old('longitude', $equipment->longitude) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="latitude">Enlik (Latitude)</label>
                                    <input placeholder="Məs: 40.4093" name="latitude" type="text"
                                           id="latitude" class="form-control"
                                           value="{{ old('latitude', $equipment->latitude) }}">
                                </div>
                            </div>

                            <div class="mt-4 d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit">
                                    <span>
                                        <i class="bi bi-check me-2"></i>
                                    </span>
                                    Düzəliş et
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div><!--End col-->
        </div><!--End row-->
    </div>
@endsection

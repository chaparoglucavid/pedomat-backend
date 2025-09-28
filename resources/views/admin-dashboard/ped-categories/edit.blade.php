@extends('admin-dashboard.layouts.admin-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-h-100 mt-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">PED Kateqoriya məlumatları</h4>
                            <a href="{{ route('ped-categories.index') }}">
                                <button class="btn btn-danger"><i class="bi bi-arrow-90deg-left me-2"></i>Geri qayıt</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ped-categories.update', encrypt($ped_category->id)) }}">
                            @csrf
                            @method('PUT')
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="category-name">Kateqoriya adı</label>
                                    <input placeholder="Kateqoriya adını daxil edin" name="category_name" type="text"
                                           id="category-name" class="form-control"
                                           value="{{ old('category_name', $ped_category->category_name) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="unit-price">Vahid qiymət</label>
                                    <input placeholder="Məs: 0.50" name="unit_price" type="number" step="0.01"
                                           id="unit-price" class="form-control"
                                           value="{{ old('unit_price', $ped_category->unit_price) }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label" for="reason-for-use">İstifadə səbəbi</label>
                                    <textarea placeholder="İstifadə səbəbini daxil edin" name="reason_for_use"
                                              id="reason-for-use" class="form-control" rows="3">{{ old('reason_for_use', $ped_category->reason_for_use) }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="active" {{ old('status', $ped_category->status) == 'active' ? 'selected' : '' }}>Aktiv</option>
                                        <option value="inactive" {{ old('status', $ped_category->status) == 'inactive' ? 'selected' : '' }}>Deaktiv</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-4 d-flex justify-content-end">
                                <button class="btn btn-success" type="submit">
                                    <span><i class="bi bi-check me-2"></i></span>
                                    Yenilə
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

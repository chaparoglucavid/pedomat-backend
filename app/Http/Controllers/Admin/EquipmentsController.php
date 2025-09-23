<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipments;
use App\Models\PedCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EquipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = Equipments::withSum('ped_categories as total_qty_available', 'equipment_ped_stocks.qty_available')->get();
        return view('admin-dashboard.equipments.index', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ped_categories = PedCategories::IsActive()->get();
        return view('admin-dashboard.equipments.create', compact('ped_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'equipment_number'   => 'required|string|max:255|unique:equipments,equipment_number',
                'equipment_name'     => 'required|string|max:255',
                'general_capacity'   => 'nullable|numeric|min:0',
                'current_address'    => 'nullable|string|max:500',
                'longitude'          => 'nullable|numeric|between:-180,180',
                'latitude'           => 'nullable|numeric|between:-90,90',
                'equipment_status'   => 'required|in:active,inactive,maintenance',
            ]);

            Equipments::create($validated);

            flash()->success('Cihaz uğurla əlavə olundu.');
            return redirect()->route('equipments.index');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            Log::error('Cihaz əlavə edilərkən xəta: '.$e->getMessage());
            flash()->error('Cihaz əlavə olunarkən xəta baş verdi.');
            return redirect()->back()->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decrypted = decrypt($id);
        $equipment = Equipments::with(['equipment_ped_stock', 'equipment_reviews.user'])->find($decrypted);
        if (!$equipment) {
            flash()->error('Cihaz tapılmadı.');
            return redirect()->route('admin.equipments.index');
        }

        $rating_average = $equipment->equipment_reviews->avg('rating');

        $rating_counts = $equipment->equipment_reviews
            ->groupBy('rating')
            ->map(fn($group) => $group->count())
            ->toArray();

        $ped_categories = PedCategories::all();
        return view('admin-dashboard.equipments.show', compact('equipment', 'ped_categories', 'rating_average', 'rating_counts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace Database\Seeders;

use App\Models\EquipmentPedStock;
use App\Models\Equipments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentPedStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipments = Equipments::all();
        foreach ($equipments as $equipment) {
            EquipmentPedStock::create([
                'equipment_id' => $equipment->id,
                'ped_category_id' => rand(1,5),
                'qty_available' => rand(10,20),
            ]);
        }
    }
}

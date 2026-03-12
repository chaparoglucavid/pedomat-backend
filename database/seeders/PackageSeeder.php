<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PackageFeature;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'title' => 'Başlanğıc Paket',
                'description' => 'Yeni başlayanlar üçün ideal seçim',
                'price' => 9.99,
                'discount_percent' => 0,
                'validity_days' => 30,
                'order_index' => 1,
                'is_popular' => false,
                'badge_text' => 'Yeni',
                'status' => 'active',
                'features' => [
                    ['name' => '5 Ped Hədiyyə', 'value' => 'Hər ay'],
                    ['name' => 'Pulsuz Çatdırılma', 'value' => 'Bəli'],
                    ['name' => '7/24 Dəstək', 'value' => 'Xeyr'],
                ]
            ],
            [
                'title' => 'Standart Paket',
                'description' => 'Ən çox seçilən balanslı paket',
                'price' => 19.99,
                'discount_percent' => 10,
                'validity_days' => 30,
                'order_index' => 2,
                'is_popular' => true,
                'badge_text' => 'Məşhur',
                'status' => 'active',
                'features' => [
                    ['name' => '12 Ped Hədiyyə', 'value' => 'Hər ay'],
                    ['name' => 'Pulsuz Çatdırılma', 'value' => 'Bəli'],
                    ['name' => '7/24 Dəstək', 'value' => 'Bəli'],
                ]
            ],
            [
                'title' => 'Premium Paket',
                'description' => 'Maksimum rahatlıq və imtiyazlar',
                'price' => 39.99,
                'discount_percent' => 20,
                'validity_days' => 30,
                'order_index' => 3,
                'is_popular' => false,
                'badge_text' => 'VIP',
                'status' => 'active',
                'features' => [
                    ['name' => '30 Ped Hədiyyə', 'value' => 'Hər ay'],
                    ['name' => 'Pulsuz Çatdırılma', 'value' => 'Bəli'],
                    ['name' => '7/24 Dəstək', 'value' => 'Bəli'],
                    ['name' => 'Özəl Endirimlər', 'value' => '15%'],
                ]
            ],
        ];

        foreach ($packages as $pkgData) {
            $features = $pkgData['features'];
            unset($pkgData['features']);
            
            $package = Package::create($pkgData);
            
            foreach ($features as $feature) {
                PackageFeature::create([
                    'package_id' => $package->id,
                    'name' => $feature['name'],
                    'value' => $feature['value'],
                ]);
            }
        }
    }
}

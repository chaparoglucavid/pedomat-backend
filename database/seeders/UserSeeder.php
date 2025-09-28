<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::create([
            'full_name'            => 'Cavid Şıxıyev',
            'email'                => 'chaparoglucavid@gmail.com',
            'phone'                => '+994508221300',
            'birthdate'            => '1994-11-29',
            'password'             => Hash::make('salamadmin'),
            'activity_status'      => 'active',
            'system_status'        => 'verified',
            'user_current_balance' => 0.00,
            'type'                 => 'admin',
        ]);

        for ($i = 0; $i < 50; $i++) {
            User::create([
                'full_name'            => $faker->name(),
                'email'                => $faker->unique()->safeEmail(),
                'phone'                => $faker->phoneNumber(),
                'birthdate'            => $faker->date('Y-m-d', '2005-01-01'),
                'password'             => Hash::make('password'),
                'activity_status'      => $faker->randomElement(['active', 'inactive']),
                'system_status'        => $faker->randomElement(['unverified', 'verified', 'banned', 'deactivated']),
                'user_current_balance' => $faker->randomFloat(2, 0, 1000),
                'type'                 => $faker->randomElement(['admin', 'user']),
            ]);
        }
    }
}

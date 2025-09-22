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

        for ($i = 0; $i < 50; $i++) {
            User::create([
                'full_name'            => $faker->name(),
                'email'                => $faker->unique()->safeEmail(),
                'phone'                => $faker->phoneNumber(),
                'birthdate'            => $faker->date('Y-m-d', '2005-01-01'),
                'password'             => Hash::make('password'),
                'activity_status'      => $faker->randomElement(['active', 'inactive']),
                'system_status'        => $faker->randomElement(['pending', 'verified', 'banned']),
                'user_current_balance' => $faker->randomFloat(2, 0, 1000),
                'type'                 => $faker->randomElement(['admin', 'user']),
            ]);
        }
    }
}

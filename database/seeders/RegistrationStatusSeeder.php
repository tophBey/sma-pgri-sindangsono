<?php

namespace Database\Seeders;

use App\Models\RegistrationStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RegistrationStatus::create([
            'is_open' => false,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\DriverApp;
use Illuminate\Database\Seeder;

class DriverAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DriverApp::create([
            'full_name' => 'Test Driver One',
            'phone_number' => '09990000001',
            'license_number' => 'TEST-LIC-001',
            'license_type' => 'Professional',
            'license_expiry_date' => '2028-12-31',
        ]);
    }
}

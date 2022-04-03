<?php

use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Device::create([
            'name_ar' => 'عمليات و عناية مركزة',
            'name_en' => 'ICU and OR',
        ]);
    }
}

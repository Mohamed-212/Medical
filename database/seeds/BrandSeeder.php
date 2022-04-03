<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Brand::create([
            'name_ar' => 'ماكينة قلب مفتوح',
            'name_en' => 'Heart Lung Machine',
            'device_id' => '1',
        ]);
    }
}

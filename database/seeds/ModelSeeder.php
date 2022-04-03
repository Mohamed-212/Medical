<?php

use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ModelBrand::create([
            'modeel' => 'S3',
            'brand' => 'Stockert',
            'description_ar' => 'description description',
            'description_en' => 'description description',
            'availability' => 'in_stock',
            'condition' => 'refurbished',
            'brand_id' => 1,
        ]);
    }
}

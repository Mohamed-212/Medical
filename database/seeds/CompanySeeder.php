<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setup_array = [
            ['key' => 'about_us_ar', 'value' => 'about us'],
            ['key' => 'about_us_en', 'value' => 'about us'],
            ['key' => 'address_ar', 'value' => 'فيلا 7 بلوك 13 التجاريين المقطم'],
            ['key' => 'address_en', 'value' => 'Villa no.7, block no.13, Togaryeen, Almokattam'],
            ['key' => 'mobile', 'value' => '01009720917'],
            ['key' => 'telephone', 'value' => '0225075516'],
            ['key' => 'email', 'value' => 'info@ammedical-eg.com'],
            ['key' => 'facebook', 'value' => 'https://www.facebook.com'],
            ['key' => 'twitter', 'value' => 'https://twitter.com'],
        ];
        foreach ($setup_array as $setup){
            \App\Models\CompanySetups::where('key', $setup['key'])->updateOrCreate($setup);
        }
    }
}

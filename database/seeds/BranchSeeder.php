<?php

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Branches::create([
            'name_ar' => 'فرع الصعيد',
            'name_en' => 'Upper Egypt Branch',
            'address_ar' => 'برج النور شارع جودة الأسدي شركة فريال الدور الأول العلوي بأسيوط',
            'address_en' => 'AL-Nour Tower, Gouda AL-Asadi Street, Feryal Company, the upper first floor, Assiut',
            'mobile' => '01065769692',
        ]);
    }
}

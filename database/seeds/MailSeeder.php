<?php

use Illuminate\Database\Seeder;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MailSettings::create([
            'port' => '587',
            'host' => 'smtp.gmail.com',
            'username' => 'mohamedhassan225588@gmail.com',
            'password' => 'Mhmm199801123211442',
            'encryption' => 'tls',
            'to' => json_encode(['mohamed@212solutionsllc.com'])
        ]);
    }
}

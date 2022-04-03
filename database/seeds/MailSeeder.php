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
            'host' => 'mail.ammedical.co',
            'username' => 'info@ammedical.co',
            'password' => '@ammedical.co',
            'encryption' => 'tls',
            'to' => json_encode(['abdallah.kamal.2013@gmail.com'])
        ]);
    }
}

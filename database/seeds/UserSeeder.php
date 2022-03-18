<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'medical_user',
            'email' => 'medical_user@212.com',
            'password' => bcrypt('P@ssw0rd'),
        ]);
    }
}

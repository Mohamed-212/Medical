<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(MailSeeder::class);
        $this->call(DeviceSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ModelSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(CompanySeeder::class);
    }
}

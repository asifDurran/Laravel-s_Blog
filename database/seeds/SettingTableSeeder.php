<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([

          'site_name'=>"Lavarel's Blog",
          'contact_number'=>'0046 761504653',
          'contact_email' => 'asif.lkhan@yahoo.com',
          'address' => 'Uppsala, Sweden',

        ]);
    }
}

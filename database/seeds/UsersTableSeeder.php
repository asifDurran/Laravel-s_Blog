<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([

            'name' => 'Asif',
            'email' => 'asif.lkhan@yahoo.com',
            'password' => bcrypt('northern'),
            'admin' =>1
   
            ]);


            App\Profile::create([
        
                'user_id' => $user->id,
                'avatar' => 'uploads/avatars/picture.jpg',
                'about' =>'Right now I am talking to my beloved father and he is saying that they cooked something special todat',
                'facebook' => 'facebook.com',
                'youtube' => 'youtube.com'
        
        
            ]);


    }
    
  



}

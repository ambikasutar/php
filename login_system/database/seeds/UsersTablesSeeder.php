<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creating record
        User::create([
            'name'    => 'Ambika Sutar',
            'email'    => 'ambikasutar.as@gmail.com',
            'password'   =>  Hash::make('login_system@123'),
            'remember_token' =>  str_random(10),
        ]);

    }
}

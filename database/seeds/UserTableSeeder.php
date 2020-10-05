<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'nom' => 'Camara',
            'prenom' => 'Mohamed Said',
            'email' => 'mohamedsaidc8@gmail.com',
            'image' => 'user.jpeg',
            'password' => '00000000',
        ]);
    }
}

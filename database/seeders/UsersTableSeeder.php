<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  =>'Anderson Oliveira',
            'email' =>'andoliversant@hotmail.com.br',
            'password' => bcrypt('123456'),
        ]);
    }
}

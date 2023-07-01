<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('123456');

        $users = [
            [
                'name' => 'Pedro',
                'email' => 'pedro@gmail.com',
                'password' => $password,
            ],
            [
                'name' => 'Javier',
                'email' => 'javier@gmail.com',
                'password' => $password,
            ],
            [
                'name' => 'Emilio',
                'email' => 'emilio@gmail.com',
                'password' => $password,
            ],
            [
                'name' => 'Luis Miguel',
                'email' => 'mitomgg13@gmail.com',
                'password' => $password,
            ],
        ];

        DB::table('users')->insert($users);
    }
}

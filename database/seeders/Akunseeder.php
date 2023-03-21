<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class Akunseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'anto',
                'name' => 'ini akun Admin',
                'email' => 'admin@example.com',
                'level' => 'adm',
                'password' => bcrypt('123456'),
            ],
            [
                'username' => 'user',
                'name' => 'ini akun User (non admin)',
                'email' => 'user@example.com',
                'level' => 'user',
                'password' => bcrypt('123456'),
            ],
            [
                'username' => '121082',
                'name' => 'esti',
                'email' => 'esti@example.com',
                'level' => 'adm',
                'password' => bcrypt('1082'),
            ],
            [
                'username' => '200404',
                'name' => 'nabila',
                'email' => 'nabila@example.com',
                'level' => 'adm',
                'password' => bcrypt('0404'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

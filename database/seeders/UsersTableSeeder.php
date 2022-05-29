<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@localhost',
                'email_verified_at' => now(),
                'password' => bcrypt('admin'), // password
            ],

        ];
           DB::table('users')->insert($data);
    }
}

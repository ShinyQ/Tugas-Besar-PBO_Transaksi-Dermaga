<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
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
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => 'user',
                'phone' => '012345678',
                'address' => 'sit dolor amet amet',
                'is_admin' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '1234',
                'phone' => '012345678',
                'address' => 'sit dolor amet amet',
                'is_admin' => 1,
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('users')->insert($data);
    }
}

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
                'name' => 'Hanvito Michael Lee',
                'email' => 'vitomichael@gmail.com',
                'password' => 'user1',
                'phone' => '08123456789',
                'address' => 'Jl. Padang Panjang',
                'is_admin' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Naufal Haritsah Luthfi',
                'email' => 'naufalharitsah@gmail.com',
                'password' => 'user2',
                'phone' => '081234567810',
                'address' => 'Jl. Buah Batu',
                'is_admin' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Kurniadi Ahmad Wijaya',
                'email' => 'kurniadi@gmail.com',
                'password' => 'user3',
                'phone' => '081234567812',
                'address' => 'Jl. Sukapura',
                'is_admin' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Firdaus Putra Kurniyanto',
                'email' => 'firdaus@gmail.com',
                'password' => 'user4',
                'phone' => '081234567813',
                'address' => 'Jl. Terusan Buah Batu',
                'is_admin' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin',
                'phone' => '081234567811',
                'address' => 'Jl. Sukabirus',
                'is_admin' => 1,
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('users')->insert($data);
    }
}

<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ItemSolidSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'container_id' => 1,
                'transaction_id' => 1,
                'name' => 'Balok Kayu',
                'weight' => '500',
                'shape' => 'balok',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 2,
                'transaction_id' => 2,
                'name' => 'triplek',
                'weight' => '500',
                'shape' => 'kotak',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 3,
                'transaction_id' => 1,
                'name' => 'paralon',
                'weight' => '10',
                'shape' => 'tabung',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 2,
                'name' => 'Balok',
                'weight' => '10',
                'shape' => 'balok',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 1,
                'transaction_id' => 1,
                'name' => 'perkakas',
                'weight' => '10',
                'shape' => 'balok',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 2,
                'transaction_id' => 2,
                'name' => 'ban',
                'weight' => '10',
                'shape' => 'bulat',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 3,
                'transaction_id' => 1,
                'name' => 'mesin',
                'weight' => '10',
                'shape' => 'kotak',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 2,
                'name' => 'pintu',
                'weight' => '10',
                'shape' => 'persegi panjang',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 1,
                'name' => 'kipas angin',
                'weight' => '10',
                'shape' => 'kotak',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('items')->insert($data);
    }
}

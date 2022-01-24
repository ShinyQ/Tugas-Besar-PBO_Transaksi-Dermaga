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
            [
                'container_id' => 5,
                'transaction_id' => 2,
                'name' => 'Lemari',
                'weight' => '20',
                'shape' => 'Persegi Panjang',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 1,
                'transaction_id' => 3,
                'name' => 'Meja Makan',
                'weight' => '20',
                'shape' => 'Persegi Panjang',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 2,
                'transaction_id' => 3,
                'name' => 'Meja Belajar',
                'weight' => '20',
                'shape' => 'Persegi Panjang',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 3,
                'transaction_id' => 3,
                'name' => 'Keramik',
                'weight' => '20',
                'shape' => 'Kotak',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 3,
                'name' => 'Marmer',
                'weight' => '50',
                'shape' => 'Kotak',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 5,
                'transaction_id' => 3,
                'name' => 'Batu Bata',
                'weight' => '50',
                'shape' => 'Persegi Panjang',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 1,
                'transaction_id' => 4,
                'name' => 'Kaca',
                'weight' => '20',
                'shape' => 'Kotak',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 2,
                'transaction_id' => 4,
                'name' => 'Beton',
                'weight' => '50',
                'shape' => 'Balok',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 3,
                'transaction_id' => 4,
                'name' => 'Rotan',
                'weight' => '10',
                'shape' => 'Kotak',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 4,
                'name' => 'Papan Tulis',
                'weight' => '20',
                'shape' => 'Persegi Panjang',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 5,
                'transaction_id' => 4,
                'name' => 'Botol',
                'weight' => '10',
                'shape' => 'Tabung',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 1,
                'transaction_id' => 3,
                'name' => 'Lampu',
                'weight' => '5',
                'shape' => 'Tabung',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 2,
                'transaction_id' => 3,
                'name' => 'Gelas',
                'weight' => '5',
                'shape' => 'Tabung',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 3,
                'transaction_id' => 3,
                'name' => 'Sepatu',
                'weight' => '5',
                'shape' => 'Oval',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 3,
                'name' => 'Sandal',
                'weight' => '5',
                'shape' => 'Oval',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 5,
                'transaction_id' => 3,
                'name' => 'Sendok',
                'weight' => '5',
                'shape' => 'Persegi Panjang',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 1,
                'transaction_id' => 4,
                'name' => 'Garpu',
                'weight' => '5',
                'shape' => 'Persegi Panjang',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 2,
                'transaction_id' => 4,
                'name' => 'Kompor',
                'weight' => '20',
                'shape' => 'Balok',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 3,
                'transaction_id' => 4,
                'name' => 'Jam Dinding',
                'weight' => '5',
                'shape' => 'Lingkaran',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 4,
                'name' => 'Velg',
                'weight' => '100',
                'shape' => 'Bulat',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 5,
                'transaction_id' => 4,
                'name' => 'Kasur',
                'weight' => '50',
                'shape' => 'Balok',
                'quantity' => '2',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('items')->insert($data);
    }
}

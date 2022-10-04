<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'user_id' => 1,
                'service_id' => 1,
                'service_detail_id' => 1,
                'name' => 'Transaction 1',
                'description' => 'Transaction 1',
                'status' => 'antrian',
                'payment_status' => 'belum bayar',
                'payment_proof' => 'Transaction 1',
                'total_price' => 100000,
                'transaction_code' => 'Transaction 1',
                'address' => 'Transaction 1',
                'phone_number' => 'Transaction 1',
                'service_date' => now(),
            ],
            [
                'user_id' => 1,
                'service_id' => 2,
                'service_detail_id' => 2,
                'name' => 'Transaction 2',
                'description' => 'Transaction 2',
                'status' => 'antrian',
                'payment_status' => 'belum bayar',
                'payment_proof' => 'Transaction 2',
                'total_price' => 100000,
                'transaction_code' => 'Transaction 2',
                'address' => 'Transaction 2',
                'phone_number' => 'Transaction 2',
                'service_date' => now(),
            ],
            [
                'user_id' => 1,
                'service_id' => 1,
                'service_detail_id' => 3,
                'name' => 'Transaction 3',
                'description' => 'Transaction 3',
                'status' => 'antrian',
                'payment_status' => 'belum bayar',
                'payment_proof' => 'Transaction 3',
                'total_price' => 100000,
                'transaction_code' => 'Transaction 3',
                'address' => 'Transaction 3',
                'phone_number' => 'Transaction 3',
                'service_date' => now(),
            ],
            [
                'user_id' => 1,
                'service_id' => 2,
                'service_detail_id' => 1,
                'name' => 'Transaction 4',
                'description' => 'Transaction 4',
                'status' => 'antrian',
                'payment_status' => 'belum bayar',
                'payment_proof' => 'Transaction 4',
                'total_price' => 100000,
                'transaction_code' => 'Transaction 4',
                'address' => 'Transaction 4',
                'phone_number' => 'Transaction 4',
                'service_date' => now(),
            ],

        ]);
    }


}

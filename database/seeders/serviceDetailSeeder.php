<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceDetail;
use Illuminate\Support\Facades\DB;

class serviceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_detail')->insert([
            [
                'service_id' => 1,
                'name' => 'Service 10000 KM',
                'description' => 'Service Ringan 1 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 1,
                'name' => 'Service 15000 KM',
                'description' => 'Service Ringan 2 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 1,
                'name' => 'Service 20000 KM',
                'description' => 'Service Ringan 3 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 1,
                'name' => 'Service Diatas 20000 KM',
                'description' => 'Service Berat 1 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 2,
                'name' => 'Turun Mesin',
                'description' => 'Service Berat 2 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 2,
                'name' => 'Pengecatan Ulang',
                'description' => 'Service Berat 3 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 3,
                'name' => 'Ban',
                'description' => 'Penggantian Sparepart 1 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 3,
                'name' => 'Velg',
                'description' => 'Penggantian Sparepart 2 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 3,
                'name' => 'Kaca',
                'description' => 'Penggantian Sparepart 3 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 3,
                'name' => 'Jok',
                'description' => 'Penggantian Sparepart 4 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 3,
                'name' => 'Lainnya',
                'description' => 'Penggantian Sparepart 10 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

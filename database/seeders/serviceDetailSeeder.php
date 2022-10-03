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
                'name' => 'Service Ringan 1',
                'description' => 'Service Ringan 1 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 1,
                'name' => 'Service Ringan 2',
                'description' => 'Service Ringan 2 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 1,
                'name' => 'Service Ringan 3',
                'description' => 'Service Ringan 3 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 2,
                'name' => 'Service Berat 1',
                'description' => 'Service Berat 1 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 2,
                'name' => 'Service Berat 2',
                'description' => 'Service Berat 2 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 2,
                'name' => 'Service Berat 3',
                'description' => 'Service Berat 3 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 3,
                'name' => 'Penggantian Sparepart 1',
                'description' => 'Penggantian Sparepart 1 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 3,
                'name' => 'Penggantian Sparepart 2',
                'description' => 'Penggantian Sparepart 2 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 3,
                'name' => 'Penggantian Sparepart 3',
                'description' => 'Penggantian Sparepart 3 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

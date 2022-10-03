<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Facades\DB;


class serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'name' => 'Service Ringan',
                'description' => 'Service 1 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Service Berat',
                'description' => 'Service 2 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penggantian Sparepart',
                'description' => 'Service 3 Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

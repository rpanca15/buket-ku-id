<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders_status')->insert([
            ['status' => 'Belum diproses'],
            ['status' => 'Sedang diproses'],
            ['status' => 'Selesai'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert(
            [
                ['title' => 'Hà Nội', 'created_at' => '2021-02-08 04:54:14'],
                ['title' => 'Hải Phòng', 'created_at' => '2021-02-08 04:54:14'],
                ['title' => 'Hà Giang', 'created_at' => '2021-02-08 04:54:14'],
                ['title' => 'Cao Bằng', 'created_at' => '2021-02-08 04:54:14'],
                ['title' => 'Lạng Sơn', 'created_at' => '2021-02-08 04:54:14'],
                ['title' => 'Phú Thọ', 'created_at' => '2021-02-08 04:54:14'],
            ]
        );
    }
}

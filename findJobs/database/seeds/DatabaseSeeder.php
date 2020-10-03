<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            PhanQuyenSeeder::class,
            NganhNgheSeeder::class,
            DiaDiemSeeder::class,
//            LoaiTaiKhoanSeeder::class
        ]);
        // $this->call(UserSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class TacVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tac_vu')->insert(
            array(
                array(
                    'name' => 'Xem bài viết',
                ),
                array(
                    'name' => 'Đăng bài viết bài viết bài viết',
                ),
                array(
                    'name' => 'Sửa tài khoản / thông tin cá nhân',
                ),
                array(
                    'name' => 'Duyệt bài viết',
                ),
                array(
                    'name' => 'Quản lý tuyển dụng',
                ),
                array(
                    'name' => 'Khóa tài khoản',
                ),
            )
        );
        //
    }
}

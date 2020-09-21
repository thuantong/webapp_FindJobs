<?php

use Illuminate\Database\Seeder;

class LoaiTaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai_tai_khoan')->insert([
            [
                'name'=>'Người tìm việc',
                'prefix'=>'1',
                'role_id'=>10
            ],
            [
                'name'=>'Người tìm việc',
                'prefix'=>'1',
                'role_id'=>9
            ],
            [

                'name'=>'Người tìm việc',
                'prefix'=>'1',
                'role_id'=>8
            ],
            [

                'name'=>'Người tìm việc',
                'prefix'=>'1',
                'role_id'=>4
            ],
            [

                'name'=>'Nhà tuyển dụng',
                'prefix'=>'2',
                'role_id'=>8
            ],
            [

                'name'=>'Nhà tuyển dụng',
                'prefix'=>'2',
                'role_id'=>5
            ],[

                'name'=>'Nhà tuyển dụng',
                'prefix'=>'2',
                'role_id'=>4
            ],[

                'name'=>'Nhà tuyển dụng',
                'prefix'=>'2',
                'role_id'=>1
            ],[

                'name'=>'Quản trị viên',
                'prefix'=>'3',
                'role_id'=>1
            ],[

                'name'=>'Quản trị viên',
                'prefix'=>'3',
                'role_id'=>2
            ],[

                'name'=>'Quản trị viên',
                'prefix'=>'3',
                'role_id'=>3
            ],[

                'name'=>'Quản trị viên',
                'prefix'=>'3',
                'role_id'=>4
            ],[

                'name'=>'Quản trị viên',
                'prefix'=>'3',
                'role_id'=>5
            ],[

                'name'=>'Quản trị viên',
                'prefix'=>'3',
                'role_id'=>6
            ],[

                'name'=>'Quản trị viên',
                'prefix'=>'3',
                'role_id'=>7
            ],[

                'name'=>'Quản trị viên',
                'prefix'=>'3',
                'role_id'=>8
            ],[

                'name'=>'Quản trị viên',
                'prefix'=>'3',
                'role_id'=>9
            ],[

                'name'=>'Quản trị viên',
                'prefix'=>'3',
                'role_id'=>10
            ],



        ]);
        //
    }
}

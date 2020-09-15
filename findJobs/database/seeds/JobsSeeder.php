<?php

use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([[
            'tieu_de' => Str::random(10),
            'luong' => 1000000,
            'khu_vuc' => 1,
            'han_tuyen' => date('Y-m-d H:i:s'),
            'chuc_vu' => 'Nhân viên',
            'kieu_lam_viec' => 1,
            'so_luong_tuyen' => 10,
            'nganh_nghe' => serialize(array(
                    array(
                        'id' => '1',
                        'name' => 'thuận1'
                    ),
                    array(
                        'id' => '2',
                        'name' => 'nga1'
                    )
                )
            ),
            'kinh_nghiem' => 0.5,
            'gioi_tinh' => 1,
            'bang_cap' => 'Đại học',
            'mo_ta' => 'làm việc đi',
            'quyen_loi' => '12 năm kinh nghiệm chỉ giáo',
            'yeu_cau_cong_viec' => 'biết css js',
            'yeu_cau_ho_so' => 'cv+đơn xin việc',
            'skill_basic' => 'html css',
            'status' => 1,
//            'employer_id' => ,
            'isConfirm' => 0,
            'isHot' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ],
            [
                'tieu_de' => Str::random(10),
                'luong' => 1000000,
                'khu_vuc' => 1,
                'han_tuyen' => date('Y-m-d H:i:s'),
                'chuc_vu' => 'Nhân viên',
                'kieu_lam_viec' => 1,
                'so_luong_tuyen' => 10,
                'nganh_nghe' => serialize(array(
                        array(
                            'id' => '1',
                            'name' => 'thuận'
                        ),
                        array(
                            'id' => '2',
                            'name' => 'nga'
                        )
                    )
                ),
                'kinh_nghiem' => 0.5,
                'gioi_tinh' => 1,
                'bang_cap' => 'Đại học',
                'mo_ta' => 'làm việc đi',
                'quyen_loi' => '12 năm kinh nghiệm chỉ giáo',
                'yeu_cau_cong_viec' => 'biết css js',
                'yeu_cau_ho_so' => 'cv+đơn xin việc',
                'skill_basic' => 'html css',
                'status' => 1,
//            'employer_id' => ,
                'isConfirm' => 0,
                'isHot' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ]]);
    }
}

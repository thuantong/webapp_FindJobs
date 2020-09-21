<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiTuyenDung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_tuyen_dung', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->unique();
            $table->string('tieu_de')->nullable();
            $table->decimal('luong', 14, 2)->unsigned()->nullable();
            $table->date('han_tuyen')->nullable();
            $table->integer('kieu_lam_viec_id')->unsigned()->nullable();
            $table->integer('chuc_vu_id')->unsigned()->nullable();
            $table->integer('so_luong_tuyen')->nullable();
            $table->integer('nganh_nghe_id')->unsigned()->nullable();
            $table->float('kinh_nghiem')->unique()->nullable();
            $table->smallInteger('gioi_tinh_tuyen')->nullable();
            $table->string('bang_cap')->nullable();
            $table->text('mo_ta')->nullable();
            $table->text('quyen_loi')->nullable();
            $table->text('yeu_cau_cong_viec')->nullable();
            $table->text('yeu_cau_ho_so')->nullable();
            $table->text('ky_nang_basic')->nullable();
            $table->smallInteger('status')->nullable();
            $table->smallInteger('isHot')->nullable();
            $table->bigInteger('nha_tuyen_dung_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bai_tuyen_dung');
    }
}

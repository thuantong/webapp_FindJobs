<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhaTuyenDung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha_tuyen_dung', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->unsigned();
            $table->string('prefix')->nullable();
            $table->text('dia_chi')->nullable();
            $table->text('websites')->nullable();
            $table->text('mang_xa_hoi')->nullable();
            $table->text('gioi_thieu')->nullable();
            $table->string('so_luong_employee')->nullable();
            $table->integer('so_chi_nhanh')->nullable();
            $table->text('dia_chi_chi_nhanhs')->nullable();
            $table->string('gio_lam_viec')->nullable();
            $table->string('ten_cong_ty')->nullable();
            $table->text('avatar')->nullable();
            $table->smallInteger('status')->nullable();
            $table->bigInteger('bai_dang_id')->unsigned()->nullable();
            $table->integer('nganh_nghe_id')->unsigned()->nullable();
            $table->bigInteger('tai_khoan_id')->unsigned()->nullable();
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
        Schema::dropIfExists('nha_tuyen_dung');
    }
}

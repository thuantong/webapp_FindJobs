<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loai_tai_khoan', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('phan_quyen')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('account_id')->references('id')->on('tai_khoan')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('nguoi_tim_viec', function (Blueprint $table) {
//            $table->foreign('nganh_nghe_id')->references('id')->on('nganh_nghe')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoan')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('nha_tuyen_dung', function (Blueprint $table) {
            $table->foreign('bai_dang_id')->references('id')->on('bai_tuyen_dung')->onDelete('cascade')->onUpdate('cascade');
//            $table->foreign('nganh_nghe_id')->references('id')->on('nganh_nghe')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoan')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('quan_tri_vien', function (Blueprint $table) {
            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoan')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('bao_cao', function (Blueprint $table) {
            $table->foreign('nguoi_tim_viec_id')->references('id')->on('nguoi_tim_viec')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('quan_tam', function (Blueprint $table) {
            $table->foreign('nguoi_tim_viec_id')->references('id')->on('nguoi_tim_viec')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('luu_bai', function (Blueprint $table) {
            $table->foreign('nguoi_tim_viec_id')->references('id')->on('nguoi_tim_viec')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bai_dang_id')->references('id')->on('bai_tuyen_dung')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('bai_tuyen_dung', function (Blueprint $table) {
            $table->foreign('kieu_lam_viec_id')->references('id')->on('kieu_lam_viec')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('chuc_vu_id')->references('id')->on('chuc_vu')->onDelete('cascade')->onUpdate('cascade');
//            $table->foreign('nganh_nghe_id')->references('id')->on('nganh_nghe')->onDelete('no action')->onUpdate('no action');
            $table->foreign('nha_tuyen_dung_id')->references('id')->on('nha_tuyen_dung')->onDelete('no action')->onUpdate('no action');
        });
        Schema::table('duyet_tin', function (Blueprint $table) {
            $table->foreign('bai_dang_id')->references('id')->on('bai_tuyen_dung')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('thich', function (Blueprint $table) {
            $table->foreign('nguoi_tim_viec_id')->references('id')->on('nguoi_tim_viec')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bai_dang_id')->references('id')->on('bai_tuyen_dung')->onDelete('cascade')->onUpdate('cascade');
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('relationships');
    }
}

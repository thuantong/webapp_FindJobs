<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnNguoitimviecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('nguoi_tim_viec', function (Blueprint $table) {
            $table->text('muc_tieu_nghe_nghiep')->nullable();
            $table->string('khu_vuc')->nullable();
            $table->integer('hoc_van')->nullable();
            $table->string('ten_truong_tot_nghiep')->nullable();
            $table->integer('loai_cong_viec')->nullable();
            $table->string('ten_cong_viec')->nullable();
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}

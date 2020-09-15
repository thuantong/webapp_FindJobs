<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->unsigned();
            $table->string('tieu_de')->nullable();
            $table->double('luong')->nullable();
            $table->integer('khu_vuc')->nullable();
            $table->date('han_tuyen')->nullable();
            $table->string('chuc_vu')->nullable();
            $table->boolean('kieu_lam_viec')->nullable();
            $table->integer('so_luong_tuyen')->nullable();
            $table->text('nganh_nghe')->nullable();
            $table->float('kinh_nghiem')->nullable();
            $table->integer('gioi_tinh')->nullable();
            $table->string('gioi_tinh_text')->nullable();
            $table->string('bang_cap')->nullable();
            $table->text('mo_ta')->nullable();
            $table->text('quyen_loi')->nullable();
            $table->text('yeu_cau_cong_viec')->nullable();
            $table->text('yeu_cau_ho_so')->nullable();
            $table->text('skill_basic')->nullable();
            $table->integer('status')->nullable();
            $table->string('status_text')->nullable();
            $table->bigInteger('employer_id')->nullable();
            $table->boolean('isConfirm')->nullable();
            $table->string('isConfirm_text')->nullable();
            $table->boolean('isHot')->nullable();
            $table->string('isHot_text')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuyetBaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duyet_bai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('status');
            $table->bigInteger('bai_dang_id')->nullable();
            $table->bigInteger('quan_tri_vien_id')->nullable();
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
        Schema::dropIfExists('duyet_bai');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewColumnNhatuyendungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nha_tuyen_dung', function (Blueprint $table) {
            $table->string('gioi_tinh_tuyen_dung','5')->nullable();
            $table->date('nam_sinh_tuyen_dung')->nullable();
            $table->string('phone_tuyen_dung','10')->nullable();
            $table->text('avatar_tuyen_dung')->nullable();
            $table->string('phone_cong_ty','10')->nullable();
            $table->string('fax_cong_ty','12')->nullable();
            $table->string('ngay_lam_viec_cong_ty')->nullable();

            $table->text('email_cong_ty')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_column_nhatuyendung');
    }
}

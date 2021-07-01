<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThucdonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thucdon', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idquan')->unsigned();
            $table->bigInteger('loaimon')->comment('1-món nước, 2-món ăn, 3-món phụ');
            $table->string('tenmon');
            $table->bigInteger('dongia');
            $table->string('hinhmon');
            $table->string('mota');
            $table->bigInteger('hidden')->default('0')->comment('0: Hiện - 1: Ẩn');
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
        Schema::dropIfExists('thucdon');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kho', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idquan')->unsigned();
            $table->bigInteger('idnguyenlieu')->unsigned();
            $table->bigInteger('dongia');
            $table->bigInteger('soluong');
            $table->bigInteger('thanhtien');
            $table->date('ngaynhap');
            $table->date('ngayhet')->nullable();
            $table->bigInteger('trangthai')->default(1)->comment('1: còn hàng, 0: hết hàng');
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
        Schema::dropIfExists('kho');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idquan')->unsigned();
            $table->bigInteger('idkhuvuc')->unsigned();
            $table->bigInteger('idban')->unsigned();
            $table->bigInteger('idthanhvien')->unsigned();
            $table->bigInteger('idkhachhang')->unsigned()->nullable();
            $table->datetime('thoigian');
            $table->bigInteger('giamgia')->default(0);
            $table->bigInteger('thanhtien')->default(0);
            $table->bigInteger('trangthai')->default(0)->comment('0: Chưa xong - 1: Đã thanh toán');
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
        Schema::dropIfExists('hoadons');
    }
}

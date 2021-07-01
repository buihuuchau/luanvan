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
            $table->bigInteger('idquan');
            $table->bigInteger('idkhuvuc');
            $table->bigInteger('idban');
            $table->bigInteger('idthanhvien');
            $table->datetime('thoigian');
            $table->bigInteger('thanhtien');
            $table->bigInteger('trangthai')->comment('0: Chưa xong - 1: Đã thanh toán');
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

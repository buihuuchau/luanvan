<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichlamviecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichlamviec', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idquan')->unsigned();
            $table->bigInteger('idcalam')->unsigned();
            $table->bigInteger('idkhuvuc')->unsigned();
            $table->bigInteger('idthanhvien')->unsigned();
            $table->date('thoigian');
            $table->bigInteger('diemdanh')->default(0)->comment('0: Vắng - 1: Có mặt');
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
        Schema::dropIfExists('lichlamviec');
    }
}

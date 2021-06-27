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
            $table->bigInteger('idquan');
            $table->bigInteger('idcalam');
            $table->bigInteger('idkhuvuc');
            $table->bigInteger('idthanhvien');
            $table->date('thoigian');
            $table->bigInteger('diemdanh')->default(0);
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

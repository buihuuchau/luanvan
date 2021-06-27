<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThanhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhvien', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idquan');
            $table->string('acc');
            $table->string('pwd');
            $table->string('hoten');
            $table->string('hinhtv');
            $table->date('namsinh');
            $table->string('sex');
            $table->string('diachi');
            $table->bigInteger('sdt');
            $table->string('ngayvaolam');
            $table->string('idchucvu');
            $table->bigInteger('luong');
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
        Schema::dropIfExists('thanhvien');
    }
}

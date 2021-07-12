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
            $table->bigInteger('idquan')->unsigned();
            $table->string('acc');
            $table->string('pwd');
            $table->string('hoten');
            $table->string('hinhtv');
            $table->date('namsinh');
            $table->string('sex');
            $table->string('diachi');
            $table->bigInteger('sdt');
            $table->date('ngayvaolam');
            $table->bigInteger('luong');
            $table->bigInteger('idvaitro')->unsigned();
            $table->bigInteger('hidden')->default(1)->comment('0: Hiện - 1: Ẩn');
            $table->bigInteger('trangthai')->default(0)->comment('0: Offline - 1: Online');
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

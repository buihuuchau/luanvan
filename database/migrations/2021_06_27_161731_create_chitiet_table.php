<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idhoadon')->unsigned();
            $table->bigInteger('idthucdon')->unsigned();
            $table->bigInteger('soluong')->unsigned();
            $table->bigInteger('gia');
            $table->string('ghichu')->nullable();
            $table->bigInteger('trangthai')->default(0);
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
        Schema::dropIfExists('chitiet');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tintuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieude',255);
            $table->string('tieudekhongdau',255);
            $table->text('tomtat');
            $table->text('noidung');
            $table->string('image');
            $table->integer('id_loaitin')->unsigned();
            $table->foreign('id_loaitin')->references('id')->on('loaitin')->onDelete('cascade');
            $table->integer('id_theloai')->unsigned();
            $table->foreign('id_theloai')->references('id')->on('theloai')->onDelete('cascade');
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
        Schema::dropIfExists('tintuc');
    }
}

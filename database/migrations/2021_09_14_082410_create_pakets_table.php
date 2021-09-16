<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namapaket');
            $table->string('kategori');
            $table->integer('workhours');
            $table->string('day');
            $table->integer('photographers');
            $table->integer('videographers');
            $table->tinyInteger('flashdisk')->default(1);
            $table->string('edited');
            $table->integer('price');
            $table->integer('idgaleri')->nullable()->index('FK_galeris');
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
        Schema::dropIfExists('pakets');
    }
}

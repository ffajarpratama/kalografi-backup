<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_id')->constrained('pakets')->onDelete('CASCADE');
            $table->string('printedphoto');
            $table->integer('ppqty');
            $table->string('photobook');
            $table->integer('pbqty');
            $table->string('venue');
            $table->string('tone');
            $table->string('weddingstyle');
            $table->string('fullname');
            $table->string('email');
            $table->integer('phonenumber');
            $table->foreignId('discount_id')->constrained('discounts')->onDelete('CASCADE');
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
        Schema::dropIfExists('bookings');
    }
}

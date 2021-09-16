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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paket_id')->nullable()->index('bookings_paket_id_foreign');
            $table->bigInteger('custom_id')->nullable()->index('fk_custom_id');
            $table->date('bookdate');
            $table->string('printedphoto');
            $table->integer('ppqty');
            $table->string('photobook');
            $table->integer('pbqty');
            $table->string('venue');
            $table->string('tone');
            $table->string('weddingstyle');
            $table->string('fullname');
            $table->string('email');
            $table->string('phonenumber');
            $table->string('address');
            $table->unsignedBigInteger('discount_id')->nullable()->index('bookings_discount_id_foreign');
            $table->integer('payment_termination')->nullable();
            $table->integer('totalprice');
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

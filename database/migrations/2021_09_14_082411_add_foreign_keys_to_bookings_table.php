<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('CASCADE');
            $table->foreign('paket_id')->references('id')->on('pakets')->onDelete('CASCADE');
            $table->foreign('custom_id', 'fk_custom_id')->references('id')->on('customs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('bookings_discount_id_foreign');
            $table->dropForeign('bookings_paket_id_foreign');
            $table->dropForeign('fk_custom_id');
        });
    }
}

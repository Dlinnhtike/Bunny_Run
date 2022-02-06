<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deli_order', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('from_name');
            $table->string('from_phone');
            $table->string('from_address');
            $table->string('from_township');
            $table->integer('from_state');
            $table->string('to_name');
            $table->string('to_phone');
            $table->string('to_address');
            $table->string('to_township');
            $table->integer('to_state');
            $table->integer('user_type');
            $table->string('deli_type');
            $table->string('pay_status');
            $table->date('a_pk_date');
            $table->string('insurance');
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
        Schema::dropIfExists('deli_order');
    }
}

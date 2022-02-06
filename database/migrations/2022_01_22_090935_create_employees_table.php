<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('empname');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('township');
            $table->integer('state_id');
            $table->integer('login_status');
            $table->date('join_date');
            $table->string('position');
            $table->string('department');
            $table->integer('branch_id');
            $table->mediumText('remark');
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
        Schema::dropIfExists('employees');
    }
}

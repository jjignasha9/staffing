<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payroll_id');
            $table->unsignedBigInteger('shift_id');
            $table->float('pay_rate');
            $table->float('hours');
            $table->float('total_amount');
            $table->foreign('payroll_id')->references('id')->on('payrolls');
            $table->foreign('shift_id')->references('id')->on('shifts');
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
        Schema::dropIfExists('payroll_items');
    }
};

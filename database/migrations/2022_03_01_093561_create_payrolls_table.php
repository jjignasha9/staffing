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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('timesheet_id');
            $table->date('day_weekend');
            $table->float('total_amount');
            $table->unsignedBigInteger('status_id')->default(1) ;
            $table->timestamps();
            
            $table->foreign('timesheet_id')->references('id')->on('timesheets');
            $table->foreign('status_id')->references('id')->on('payroll_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
};

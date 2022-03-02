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
        Schema::create('workdays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('timesheet_id');
            $table->date('date');
            $table->time('in_time');
            $table->time('out_time');
            $table->float('break');
            $table->float('total_hours');
            $table->unsignedBigInteger('shift_id');
            $table->longText('comment')->nullable();
            $table->timestamps();

            $table->foreign('timesheet_id')->references('id')->on('timesheets');
            $table->foreign('shift_id')->references('id')->on('shifts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workdays');
    }
};

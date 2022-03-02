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
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('supervisor_id');
            $table->date('day_weekend');
            $table->dateTime('submitted_at')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->unsignedBigInteger('approved_by');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_invoiced')->default(false);
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('supervisor_id')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('timesheet_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
};

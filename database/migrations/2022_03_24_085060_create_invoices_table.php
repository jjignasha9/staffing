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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('timesheet_id');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->unsignedBigInteger('terms_id');
            $table->float('total_amount');
            $table->date('bill_date');
            $table->date('due_date');
            $table->string('file')->nullable();
            $table->timestamps();
            $table->foreign('timesheet_id')->references('id')->on('timesheets');
            $table->foreign('status_id')->references('id')->on('invoice_statuses');
            $table->foreign('terms_id')->references('id')->on('terms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};

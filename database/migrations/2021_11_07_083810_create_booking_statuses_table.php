<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_statuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('booking_money')->nullable();
            $table->string('initial_booking_money')->nullable();
            $table->string('booking_money_payment_type')->nullable();
            $table->string('booking_money_paid')->nullable();
            $table->string('booking_money_due')->nullable();
            $table->dateTime('booking_money_paid_date')->nullable();
            $table->dateTime('booking_money_due_date')->nullable();
            $table->text('booking_money_note')->nullable();
            $table->string('crm_id')->nullable();
            $table->boolean('approval')->default(1);
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
        Schema::dropIfExists('booking_statuses');
    }
}


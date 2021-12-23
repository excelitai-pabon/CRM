<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('khajna_money')->nullable();
            $table->string('initial_khajna_money')->nullable();
            $table->string('khajna_money_payment_type')->nullable();
            $table->string('khajna_money_paid')->nullable();
            $table->string('khajna_money_due')->nullable();
            $table->dateTime('khajna_money_paid_date')->nullable();
            $table->dateTime('khajna_money_due_date')->nullable();
            $table->text('khajna_money_note')->nullable();

            $table->bigInteger('car_parking_money')->nullable();
            $table->string('initial_car_parking_money')->nullable();
            $table->string('car_parking_money_payment_type')->nullable();
            $table->string('car_parking_money_paid')->nullable();
            $table->string('car_parking_money_due')->nullable();
            $table->dateTime('car_parking_money_paid_date')->nullable();
            $table->dateTime('car_parking_money_due_date')->nullable();
            $table->text('car_parking_money_note')->nullable();

            $table->bigInteger('registrationpayment_money')->nullable();
            $table->string('initial_registrationpayment_money')->nullable();
            $table->string('registrationpayment_money_payment_type')->nullable();
            $table->string('registrationpayment_money_paid')->nullable();
            $table->string('registrationpayment_money_due')->nullable();
            $table->dateTime('registrationpayment_money_paid_date')->nullable();
            $table->dateTime('registrationpayment_money_due_date')->nullable();
            $table->text('registrationpayment_money_note')->nullable();

            $table->string('crm_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function registration()
    {
        Schema::dropIfExists('others');
    }
}

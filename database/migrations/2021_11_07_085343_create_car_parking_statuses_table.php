<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarParkingStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_parking_statuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('car_parking_money')->nullable();
            $table->string('initial_car_parking_money')->nullable();
            $table->string('car_parking_money_payment_type')->nullable();
            $table->string('car_parking_money_paid')->nullable();
            $table->string('car_parking_money_due')->nullable();
            $table->dateTime('car_parking_money_paid_date')->nullable();
            $table->dateTime('car_parking_money_due_date')->nullable();
            $table->text('car_parking_money_note')->nullable();
            $table->boolean('approval')->default(1);
            $table->string('crm_id')->nullable();
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
        Schema::dropIfExists('car_parking_statuses');
    }
}

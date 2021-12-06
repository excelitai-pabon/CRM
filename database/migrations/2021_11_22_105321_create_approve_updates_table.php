<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApproveUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approve_updates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('admin_id');
            //start adding field
            $table->bigInteger('booking_money')->nullable();
            $table->string('initial_booking_money')->nullable();
            $table->string('booking_money_payment_type')->nullable();
            $table->string('booking_money_paid')->nullable();
            $table->string('booking_money_due')->nullable();
            $table->dateTime('booking_money_paid_date')->nullable();
            $table->dateTime('booking_money_due_date')->nullable();
            $table->text('booking_money_note')->nullable();
            //down_payment
            $table->bigInteger('downpayment_money')->nullable();
            $table->string('initial_downpayment_money')->nullable();
            $table->string('downpayment_money_payment_type')->nullable();
            $table->string('downpayment_money_paid')->nullable();
            $table->string('downpayment_money_due')->nullable();
            $table->dateTime('downpayment_money_paid_date')->nullable();
            $table->dateTime('downpayment_money_due_date')->nullable();
            $table->text('downpayment_money_note')->nullable();
            //car_parking
            $table->bigInteger('car_parking_money')->nullable();
            $table->string('initial_car_parking_money')->nullable();
            $table->string('car_parking_money_payment_type')->nullable();
            $table->string('car_parking_money_paid')->nullable();
            $table->string('car_parking_money_due')->nullable();
            $table->dateTime('car_parking_money_paid_date')->nullable();
            $table->dateTime('car_parking_money_due_date')->nullable();
            $table->text('car_parking_money_note')->nullable();
            //land filling 1
            $table->bigInteger('land_filling_money_1')->nullable();
            $table->string('initial_land_filling_money')->nullable();
            $table->string('land_filling_money_payment_type_1')->nullable();
            $table->string('land_filling_money_paid_1')->nullable();
            $table->string('land_filling_money_due_1')->nullable();
            $table->dateTime('land_filling_money_paid_date_1')->nullable();
            $table->dateTime('land_filling_money_due_date_1')->nullable();
            $table->text('land_filling_money_note_1')->nullable();
            //land filling 2nd
            $table->bigInteger('land_filling_money_2')->nullable();
            $table->string('initial_land_filling_money2')->nullable();
            $table->string('land_filling_money_payment_type_2')->nullable();
            $table->string('land_filling_money_paid_2')->nullable();
            $table->string('land_filling_money_due_2')->nullable();
            $table->dateTime('land_filling_money_paid_date_2')->nullable();
            $table->dateTime('land_filling_money_due_date_2')->nullable();
            $table->text('land_filling_money_note_2')->nullable();
            //building pilling
            $table->bigInteger('building_pilling_money')->nullable();
            $table->string('initial_building_pilling_money')->nullable();
            $table->string('building_pilling_money_payment_type')->nullable();
            $table->string('building_pilling_money_paid')->nullable();
            $table->string('building_pilling_money_due')->nullable();
            $table->dateTime('building_pilling_money_paid_date')->nullable();
            $table->dateTime('building_pilling_money_due_date')->nullable();
            $table->text('building_pilling_money_note')->nullable();
            //first floor
            $table->bigInteger('floor_roof_casting_money_1st')->nullable();
            $table->string('initial_floor_roof_casting_money_1st')->nullable();
            $table->string('floor_roof_casting_money_payment_type_1st')->nullable();
            $table->string('floor_roof_casting_money_paid_1st')->nullable();
            $table->string('floor_roof_casting_money_due_1st')->nullable();
            $table->dateTime('floor_roof_casting_money_paid_date_1st')->nullable();
            $table->dateTime('floor_roof_casting_money_due_date_1st')->nullable();
            $table->text('floor_roof_casting_money_note_1st')->nullable();
            //finishing work

            $table->bigInteger('finishing_work_money')->nullable();
            $table->string('initial_finishing_work_money')->nullable();
            $table->string('finishing_work_money_payment_type')->nullable();
            $table->string('finishing_work_money_paid')->nullable();
            $table->string('finishing_work_money_due')->nullable();
            $table->dateTime('finishing_work_money_paid_date')->nullable();
            $table->dateTime('finishing_work_money_due_date')->nullable();
            $table->text('finishing_work_money_note')->nullable();
            //after hand over
            $table->bigInteger('after_handover_money')->nullable();
            $table->string('initial_after_handover_money')->nullable();
            $table->string('after_handover_money_payment_type')->nullable();
            $table->string('after_handover_money_paid')->nullable();
            $table->string('after_handover_money_due')->nullable();
            $table->dateTime('after_handover_money_paid_date')->nullable();
            $table->dateTime('after_handover_money_due_date')->nullable();
            $table->text('after_handover_money_note')->nullable();
            //end fields
            $table->tinyInteger('approve_status')->default(0);
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
        Schema::dropIfExists('approve_updates');
    }
}

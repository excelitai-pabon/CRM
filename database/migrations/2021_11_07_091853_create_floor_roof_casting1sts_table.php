<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloorRoofCasting1stsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floor_roof_casting1sts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('floor_roof_casting_money_1st')->nullable();
            $table->string('initial_floor_roof_casting_money_1st')->nullable();
            $table->string('floor_roof_casting_money_payment_type_1st')->nullable();
            $table->string('floor_roof_casting_money_paid_1st')->nullable();
            $table->string('floor_roof_casting_money_due_1st')->nullable();
            $table->dateTime('floor_roof_casting_money_paid_date_1st')->nullable();
            $table->dateTime('floor_roof_casting_money_due_date_1st')->nullable();
            $table->text('floor_roof_casting_money_note_1st')->nullable();
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
        Schema::dropIfExists('floor_roof_casting1sts');
    }
}

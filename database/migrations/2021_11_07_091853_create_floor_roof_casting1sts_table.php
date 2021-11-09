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
            $table->bigInteger('1st_floor_roof_casting_money');
            $table->string('1st_floor_roof_casting_money_payment_type');
            $table->string('1st_floor_roof_casting_money_paid')->nullable();
            $table->string('1st_floor_roof_casting_money_due')->nullable();
            $table->dateTime('1st_floor_roof_casting_money_paid_date')->nullable();
            $table->dateTime('1st_floor_roof_casting_money_due_date')->nullable();
            $table->text('1st_floor_roof_casting_money_note')->nullable();
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
        Schema::dropIfExists('floor_roof_casting1sts');
    }
}

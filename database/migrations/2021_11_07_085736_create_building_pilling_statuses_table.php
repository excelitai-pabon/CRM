<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingPillingStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_pilling_statuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');  
            $table->bigInteger('building_pilling_money');
            $table->string('building_pilling_money_payment_type');
            $table->string('building_pilling_money_paid')->nullable();
            $table->string('building_pilling_money_due')->nullable();
            $table->dateTime('building_pilling_money_paid_date')->nullable();
            $table->dateTime('building_pilling_money_due_date')->nullable();
            $table->text('building_pilling_money_note')->nullable();
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
        Schema::dropIfExists('building_pilling_statuses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfterHandoverMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_handover_money', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('after_handover_money')->nullable();
            $table->string('initial_after_handover_money')->nullable();
            $table->string('after_handover_money_payment_type')->nullable();
            $table->string('after_handover_money_money_paid')->nullable();
            $table->string('after_handover_money_money_due')->nullable();
            $table->dateTime('after_handover_money_paid_date')->nullable();
            $table->dateTime('after_handover_money_due_date')->nullable();
            $table->text('after_handover_money_note')->nullable();
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
        Schema::dropIfExists('after_handover_money');
    }
}

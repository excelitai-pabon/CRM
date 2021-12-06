<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownpaymentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downpayment_statuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('downpayment_money')->nullable();
            $table->string('initial_downpayment_money')->nullable();
            $table->string('downpayment_money_payment_type')->nullable();
            $table->string('downpayment_money_paid')->nullable();
            $table->string('downpayment_money_due')->nullable();
            $table->dateTime('downpayment_money_paid_date')->nullable();
            $table->dateTime('downpayment_money_due_date')->nullable();
            $table->text('downpayment_money_note')->nullable();
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
        Schema::dropIfExists('downpayment_statuses');
    }
}




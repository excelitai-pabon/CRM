<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('installment_no');
            $table->bigInteger('installment_amount');
            $table->bigInteger('installment_paid');
            $table->bigInteger('installment_due')->nullable();
            $table->dateTime('installment_date');
            $table->dateTime('installment_due_date')->nullable();
            $table->text('installment_note')->nullable();
            $table->string('payment_installment_type')->nullable();
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
        Schema::dropIfExists('installments');
    }
}



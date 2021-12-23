<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinishingWorkStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finishing_work_statuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('finishing_work_money')->nullable();
            $table->string('initial_finishing_work_money')->nullable();
            $table->string('finishing_work_money_payment_type')->nullable();
            $table->string('finishing_work_money_paid')->nullable();
            $table->string('finishing_work_money_due')->nullable();
            $table->dateTime('finishing_work_money_paid_date')->nullable();
            $table->dateTime('finishing_work_money_due_date')->nullable();
            $table->text('finishing_work_money_note')->nullable();
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
        Schema::dropIfExists('finishing_work_statuses');
    }
}


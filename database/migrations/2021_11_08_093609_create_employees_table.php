<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //  check string fields for manager,admin,general
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('address');
            $table->string('designation');
            $table->string('department');
            $table->boolean('manager')->default(0);
            $table->boolean('admin')->default(0);
            $table->boolean('general')->default(0);
            $table->text('profile_photo_path')->nullable();
            $table->string('crm_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken(); 
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
        Schema::dropIfExists('employees');
    }
}

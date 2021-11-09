<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('file_no')->unique();
            $table->string('member_name');
            $table->string('father_name');
            $table->string('mother_name');
	        $table->string('husband_name')->nullable();
            $table->string('email')->unique();
            $table->string('permanent_address')->nullable();
	        $table->string('mailing_address')->nullable();
            $table->string('phone_no_1');
            $table->string('phone_no_2')->nullable();
            $table->date('date_of_birth');
            $table->bigInteger('national_id');
            $table->string('profession');
            $table->string('office_address')->nullable();
            $table->string('designation')->nullable();
            $table->string('nominee_name');
            $table->string('relation_with_mominee');
            $table->string('building_no');
	        $table->string('member_image')->nullable();
	        $table->string('nominee_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}




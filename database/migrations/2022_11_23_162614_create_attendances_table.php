<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('mobile');
            $table->string('country_code');
            $table->string('otp_code');
            $table->string('first_name');
            $table->string('last_name');
            $table->dateTime('dob');
            $table->enum('gender', ['male', 'female']);
            $table->string('birth_place');
            $table->string('country_of_residency');
            $table->string('passport_no');
            $table->dateTime('issue_date');
            $table->dateTime('expiry_date');
            $table->string('place_of_issue');
            $table->dateTime('arrival_date');
            $table->string('profession');
            $table->string('organization');
            $table->integer('visa_duration');
            $table->enum('visa_status', ['single', 'multiple']);
            $table->string('passport_image');
            $table->string('personal_image');
            $table->dateTime('check_in_date');
            $table->dateTime('check_out_date');
            $table->enum('room_type', ['king', 'twin']);
            $table->dateTime('add_check_in_date');
            $table->dateTime('add_check_out_date');
            $table->enum('add_room_type', ['king', 'twin']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}

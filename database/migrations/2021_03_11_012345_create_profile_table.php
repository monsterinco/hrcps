<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('gender');
            $table->string('position');
            $table->string('section_program');
            $table->string('division');
            $table->string('salary_grade');
            $table->string('salary_amount');
            $table->string('entrance_to_duty');
            $table->string('tin_number');
            $table->string('phic_number');
            $table->string('gsis_bp_number');
            $table->string('remarks');
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
        Schema::dropIfExists('profile');
    }
}

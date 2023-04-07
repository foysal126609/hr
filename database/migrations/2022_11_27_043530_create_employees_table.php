<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->integer('department_id');
            $table->integer('designation_id');
            $table->string('email');
            $table->string('mobile');
            $table->string('address');
            $table->string('nid');
            $table->string('image');
            $table->string('blood_group');
            $table->date('date_of_birth');
            $table->date('joining_date');
            $table->string('employee_type');
            $table->string('basic_salary');
            $table->tinyInteger('status');
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
};

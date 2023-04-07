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
        Schema::create('attendance_details', function (Blueprint $table) {
            $table->id();      $table->string('attendance_info_id',20)->nullable();
            $table->string('emp_id',20)->nullable();
            $table->enum('attendance_status', ['1', '2', '3', '4', '5'])->comment('1 = attendanced, 2= absent, 3 = leave, 4 = friday, 5 = gov-holliday');
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
        Schema::dropIfExists('attendance_details');
    }
};

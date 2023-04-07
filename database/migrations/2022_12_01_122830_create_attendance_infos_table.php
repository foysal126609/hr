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
        Schema::create('attendance_infos', function (Blueprint $table) {
            $table->id();
            $table->date('attendance_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('attendance_comment',250)->nullable();
            $table->enum('row_status', ['1', '2'])->comment('1 = Prepared, 2 = Approved');
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
        Schema::dropIfExists('attendance_infos');
    }
};

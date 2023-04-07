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
        Schema::create('employee_infos', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id_no',20)->nullable();
            $table->string('employee_name', 20)->nullable();
            $table->string('fathers_name', 20)->nullable();
            $table->string('mothers_name', 20)->nullable();
            $table->string('mobile_number',20)->default(0);
            $table->string('e_email')->unique();
            $table->string('present_address',250)->nullable();
            $table->string('permanent_address',250)->nullable();
            $table->decimal('monthly_salary',12,2)->default(0);
            $table->string('designation', 20)->nullable();
            $table->date('joining_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('row_status', ['1', '2'])->default('1')->comment('1 = Active, 2 = Inactive');
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
        Schema::dropIfExists('employee_infos');
    }
};

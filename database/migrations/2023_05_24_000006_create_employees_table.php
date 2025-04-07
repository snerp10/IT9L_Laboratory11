<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('employee_id')->primary();
            $table->string('first_name', 20);
            $table->string('last_name', 25);
            $table->string('email', 100);
            $table->string('phone_number', 20);
            $table->date('hire_date');
            $table->integer('job_id');
            $table->decimal('salary', 8, 2);
            $table->integer('manager_id')->nullable();
            $table->integer('department_id');
            
            $table->foreign('job_id')->references('job_id')->on('jobs');
            $table->foreign('department_id')->references('department_id')->on('departments');
            $table->foreign('manager_id')->references('employee_id')->on('employees')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

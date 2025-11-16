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
            $table->uuid('id')->primary();

            // Required Fields
            $table->string('nik', 16)->unique()->comment('NIK 8–16 digit');
            $table->text('full_name');
            $table->string('email')->unique();
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->enum('position', ['Staff', 'Admin', 'Supervisor', 'Manager', 'Intern']);
            $table->enum('division', ['HRD', 'Finance', 'IT', 'Marketing', 'Operation', 'GA']);
            $table->date('date_of_joining');
            
            // Optional Fields
            $table->string('phone_number', 16)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->enum('employment_status', ['Aktif', 'Non-aktif', 'Resign', 'Cuti'])->nullable();
            $table->decimal('basic_salary', 15, 2)->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('nik');
            $table->index('division');
            $table->index('position');
            $table->index('employment_status');
            $table->index('date_of_joining');
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

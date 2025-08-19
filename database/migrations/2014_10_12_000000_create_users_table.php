<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique()->nullable(); 
            $table->string('mobile_no')->nullable();
            $table->tinyInteger('gender')->comment('1=Male, 2=Female, 3=Other')->nullable();
            $table->date('dob')->nullable();
            $table->date('join_date')->nullable();

            $table->text('current_address')->nullable();
            $table->text('permanent_address')->nullable();

            $table->enum('role', ['Admin', 'Resident', 'Staff'])->default('Resident');
            $table->string('username')->unique();
            $table->string('password');

            $table->enum('id_proof_type', ['Aadhaar', 'PAN', 'DL', 'Passport'])->nullable();
            $table->string('id_proof_number')->nullable();
            $table->string('id_proof_file')->nullable(); 

           $table->boolean('login_mail')->default(false);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

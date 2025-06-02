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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('fullname');
            $table->string('nik')->unique();
            $table->enum('gender',['Laki-laki', 'Wanita']);
            $table->string('nisn')->unique();
            $table->string('place_of_birth');
            $table->enum('status',['accepted', 'rejected'])->nullable(true); //baru di rubah
            $table->date('date_of_birth');
            $table->string('phone')->unique();
            $table->string('student_photo')->nullable(true);//colom baru

            $table->text('address');


            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

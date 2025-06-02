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
        Schema::create('custodians', function (Blueprint $table) {

            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('phone');
            $table->string('custodian_job');
            $table->unsignedBigInteger('custodian_income');
            $table->text('address');

            $table->uuid('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custodians');
    }
};

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
        Schema::create('previous_shcools', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('shcool_name');
            $table->year('graduation_year');
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
        Schema::dropIfExists('previous_shcools');
    }
};

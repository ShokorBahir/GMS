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
        Schema::create('student_files', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Faculty::class)->nullable();
            $table->foreignIdFor(\App\Models\Department::class)->nullable();
            $table->integer('year')->nullable();
            $table->string('path')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('faculty_id')->on('faculties')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('department_id')->on('departments')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_files');
    }
};

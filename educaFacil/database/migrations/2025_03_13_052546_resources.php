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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string("Name");
            $table->unsignedBigInteger("course_id");
            $table->unsignedBigInteger("teacher_id");
            $table->foreign("course_id")->references("id")->on("courses")->onDelete("cascade");
            $table->foreign("teacher_id")->references("user_id")->on("teachers")->onDelete("cascade");
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};

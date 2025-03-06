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
        Schema::create('submit', function (Blueprint $table) {
            $table->id();
            $table->integer("Points")->nullable();
            $table->unsignedBigInteger("hw_id");
            $table->unsignedBigInteger("student_id");
            $table->foreign("hw_id")->references("id")->on("homework")->onDelete("cascade");
            $table->foreign("student_id")->references("user_id")->on("students")->onDelete("cascade");
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submit');
    }
};

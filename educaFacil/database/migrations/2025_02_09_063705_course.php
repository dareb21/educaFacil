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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("desc");
            $table->integer("duration");
            $table->string("mode");
            $table->integer("student_max");
            $table->date("date_start");
            $table->unsignedBigInteger("teacher_id");
            $table->unsignedBigInteger("category_id");
            $table->foreign("teacher_id")->references("user_id")->on("teachers");
            $table->foreign("category_id")->references("id")->on("categories");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

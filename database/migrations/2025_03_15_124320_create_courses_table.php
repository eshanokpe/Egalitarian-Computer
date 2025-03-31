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
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('image');
            $table->unsignedBigInteger('instructor_id');
            $table->integer('students_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->integer('rating')->default(0);
            $table->timestamps();
        });
        
        // Add foreign key constraint separately
        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('instructor_id')
                  ->references('id')
                  ->on('instructors')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['instructor_id']);
        });
        
        Schema::dropIfExists('courses');
    }
};

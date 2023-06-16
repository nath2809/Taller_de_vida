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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->foreignId('author_id')->references('id')->on('users');
            $table->string('description', 500)->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->integer('participants')->nullable();
            $table->string('boys')->nullable();
            $table->string('girls')->nullable();
            $table->string('attendance')->nullable();
            $table->string('report')->nullable();
            $table->string('image_activity')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

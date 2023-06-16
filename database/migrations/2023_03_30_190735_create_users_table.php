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
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('surnames')->nullable();
                $table->string('type_document')->nullable();
                $table->string('document_number')->nullable()->unique();
                $table->string('email')->nullable()->unique();
                $table->string('phone_number')->nullable()->unique();
                $table->string('region')->nullable();
                $table->string('city')->nullable();
                $table->date('birthdate')->nullable();
                $table->enum('status',['Active','Inactive'])->default('Active');
                $table->foreignId('role_id')->default(2)->references('id')->on('roles');
                $table->string('password')->nullable();
                $table->string('image_profile')->nullable()->default('');
                //$table->rememberToken();
                $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     */
    
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

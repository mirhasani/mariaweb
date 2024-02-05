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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('full_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_country')->nullable();
            $table->string('contact_number', 10)->nullable();
            $table->string('contact_email')->nullable();
            $table->json('social_links')->nullable();
            $table->string('address')->nullable();
            $table->boolean('status')->default(true)->nullable();
            $table->string('about')->nullable();
            $table->string('marrid')->nullable();
            $table->string('gender')->nullable();
            $table->string('khedmat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

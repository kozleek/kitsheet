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
        Schema::create('kits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('count_worksheets')->nullable();
            $table->integer('count_examples')->nullable();
            $table->integer('count_numbers')->nullable();
            $table->json('range_numbers')->nullable();
            $table->json('range_operations')->nullable();
            $table->json('settings_kit')->nullable();
            $table->json('settings_worksheets')->nullable();
            $table->json('settings_examples')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kits');
    }
};

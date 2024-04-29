<?php

use App\Models\Kit;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sheets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Kit::class)->constrained()->cascadeOnDelete();
            $table->string('code')->required();
            $table->string('name')->nullable();
            $table->string('result')->required();
            $table->boolean('is_finished')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sheets');
    }
};

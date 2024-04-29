<?php

use App\Models\Sheet;
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
        Schema::create('examples', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sheet::class)->constrained()->cascadeOnDelete();
            $table->string('specification')->required();
            $table->string('specification_formatted')->nullable();
            $table->string('result')->required();
            $table->string('answer')->nullable();
            $table->boolean('is_correct')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examples');
    }
};

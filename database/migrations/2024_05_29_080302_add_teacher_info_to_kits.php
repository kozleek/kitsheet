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
        Schema::table('kits', function (Blueprint $table) {
            $table->string('teacher_name')->nullable()->after('description');
            $table->string('teacher_email')->nullable()->after('teacher_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kits', function (Blueprint $table) {
            $table->dropColumn('teacher_name');
            $table->dropColumn('teacher_email');
        });
    }
};

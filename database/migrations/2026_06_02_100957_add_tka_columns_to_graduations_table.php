<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('graduations', function (Blueprint $table) {

            $table->string('participant_number')->nullable();

            $table->string('birth_place_date')->nullable();

            $table->decimal('mtk_score', 5, 2)->nullable();

            $table->decimal('indo_score', 5, 2)->nullable();

            $table->string('mtk_category')->nullable();

            $table->string('indo_category')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('graduations', function (Blueprint $table) {

            $table->dropColumn([
                'participant_number',
                'birth_place_date',
                'mtk_score',
                'indo_score',
                'mtk_category',
                'indo_category',
            ]);

        });
    }
};

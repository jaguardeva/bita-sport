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
        Schema::create('field_facility', function (Blueprint $table) {
            $table->uuid()->primary()->unique();
            $table->foreignUuid('field_uuid')->on('fields')->onDelete('cascade');
            $table->foreignUuid('facility_uuid')->on('facilities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_facility');
    }
};

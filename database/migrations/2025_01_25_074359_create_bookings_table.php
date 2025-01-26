<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid()->primary()->unique();
            $table->date("booking_date");
            $table->integer("duration");
            $table->integer("total_price");
            $table->enum("status", ["pending", "approved", "decline", 'canceled']);
            $table->foreignUuid('user_id')->on('users')->onDelete('cascade');
            $table->foreignUuid('field_id')->on('fields')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

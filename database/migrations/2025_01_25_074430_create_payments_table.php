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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid()->primary()->unique();
            $table->decimal("amount", 10, 2);
            $table->enum("payment_method", ["cash", "bank"]);
            $table->enum("payment_status", ["pending", "paid", "failed"]);
            $table->date("payment_date");
            $table->foreignUuid("booking_uuid")->on("bookings")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

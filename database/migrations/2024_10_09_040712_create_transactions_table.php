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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donation_id')->constrained()->onDelete('cascade');
            $table->string('transaction_code');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_status', ['success', 'failed', 'pending'])->default('pending');
            $table->string('midtrans_order_id')->nullable();
            $table->enum('midtrans_status', ['settlement', 'pending', 'cancel', 'deny', 'expire'])->default('pending');
            $table->timestamp('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

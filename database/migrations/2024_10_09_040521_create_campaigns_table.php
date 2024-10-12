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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->longText('images');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('subcategories_id');
            $table->string('title');
            $table->text('description');
            $table->decimal('goal_amount', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_recomendation')->default(false);
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};

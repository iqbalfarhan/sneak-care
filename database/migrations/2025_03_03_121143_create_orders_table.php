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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained()->cascadeOnDelete();
            $table->string('invoice_no')->unique();
            $table->foreignId('kasir_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('teknisi_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('payment_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('discount_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete();
            $table->date('estimate_date')->nullable();
            $table->decimal('shipping_cost', 8, 2)->default(0);
            $table->decimal('total_pay', 8, 2)->default(0);
            $table->boolean('paid')->default(false);
            $table->enum('status', ['draft', 'progress', 'done', 'complete', 'cancelled'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

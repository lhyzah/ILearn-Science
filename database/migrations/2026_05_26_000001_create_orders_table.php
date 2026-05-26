<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_school')->nullable();
            $table->string('payment_method');
            $table->string('payment_status')->default('verified');
            $table->string('email_status')->default('pending');
            $table->json('items');
            $table->json('totals');
            $table->timestamp('checked_out_at')->nullable();
            $table->timestamp('email_sent_at')->nullable();
            $table->timestamp('email_failed_at')->nullable();
            $table->text('email_error')->nullable();
            $table->timestamps();

            $table->index('customer_email');
            $table->index('payment_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

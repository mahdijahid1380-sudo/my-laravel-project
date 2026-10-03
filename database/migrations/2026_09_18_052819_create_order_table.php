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
    $table->id('order_id');

    $table->foreignId('user_id')
           ->constrained('users', 'user_id');

    $table->foreignId('table_id')
          ->constrained('tables', 'table_id');

    $table->dateTime('order_time');
    $table->decimal('total_amount', 10, 2);

    $table->enum('status', [
        'pending',
        'preparing',
        'served',
        'completed',
        'cancelled'
    ]);

    $table->string('customer_phone');
    $table->string('customer_name');

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

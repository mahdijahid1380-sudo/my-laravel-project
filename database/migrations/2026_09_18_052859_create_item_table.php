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
    if (!Schema::hasTable('menu_items')) {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id('menu_item_id');

            $table->foreignId('order_id')
                  ->constrained('orders', 'order_id');

            $table->foreignId('menu_id')
                  ->constrained('menu', 'menu_id');

            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->string('customer_name');
            $table->timestamps();
        });
    }
}

        
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};

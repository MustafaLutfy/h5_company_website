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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("original_price");
            $table->string("new_price")->nullable();
            $table->boolean("is_instock");
            $table->boolean("product_order");
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            $table->longtext("description");
            $table->longtext("description_ar");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

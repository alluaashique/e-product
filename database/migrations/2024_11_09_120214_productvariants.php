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
            $table->bigIncrements('id');
            $table->foreignId('category_id')->nullable()->constrained('product_categories')->cascadeOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->cascadeOnDelete();
            $table->foreignId('product_names_id')->nullable()->constrained('product_names')->cascadeOnDelete();
            $table->foreignId('unit')->default(3)->comment('1:piece, 2:kg, 3:litre');
            $table->string('quantity')->nullable();
            $table->string('packaging')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
            $table->tinyInteger('is_active')->default(1)->comment('1:active, 0:inactive');
            $table->timestamps();
            $table->softDeletes();
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

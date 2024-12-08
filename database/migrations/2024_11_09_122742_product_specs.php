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
        Schema::create('product_specs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('parent_id')->nullable()->constrained('product_specs')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('product_categories')->cascadeOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->cascadeOnDelete();            
            $table->foreignId('product_id')->nullable()->constrained('products')->cascadeOnDelete();    
            $table->foreignId('specification_id')->nullable()->constrained('specifications')->cascadeOnDelete();
            $table->string('specification')->nullable();
            $table->tinyInteger('is_quantity')->default(0);            
            $table->tinyInteger('is_weight')->default(0);
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
        Schema::dropIfExists('product_specs');
    }
};

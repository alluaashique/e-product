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
        Schema::create('product_spec_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('parent_id')->nullable()->constrained('product_spec_values')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('product_categories')->cascadeOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->cascadeOnDelete();            
            $table->foreignId('product_id')->nullable()->constrained('products')->cascadeOnDelete();
            $table->foreignId('product_spec_id')->nullable()->constrained('product_specs')->cascadeOnDelete();
            $table->foreignId('value_id')->nullable()->constrained('values')->cascadeOnDelete();
            $table->string('value')->nullable();            
            $table->decimal('price', 10, 2);
            $table->tinyInteger('is_active')->default(1)->comment('1:active, 0:inactive');
            $table->timestamps();
            $table->softDeletes();
        });
        schema::table('product_specs', function (Blueprint $table) {
            $table->foreignId('product_value_id')->nullable()->after('parent_id')->constrained('product_spec_values')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_specs', function (Blueprint $table) {
            $table->dropForeign(['product_value_id']);
            $table->dropColumn('product_value_id');
        });
        Schema::dropIfExists('product_spec_values');
    }
};

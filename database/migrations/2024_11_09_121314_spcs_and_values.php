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
        Schema::create('specifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('parent_id')->nullable()->constrained('specifications')->cascadeOnDelete();
            $table->string('specification');
            $table->tinyInteger('is_active')->default(1)->comment('1:active, 0:inactive');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('parent_id')->nullable()->constrained('values')->cascadeOnDelete();
            $table->foreignId('specification_id')->nullable()->constrained('specifications')->cascadeOnDelete();
            $table->string('value');
            $table->tinyInteger('is_active')->default(1)->comment('1:active, 0:inactive');
            $table->timestamps();
            $table->softDeletes();
        });
        schema::table('specifications', function (Blueprint $table) {
            $table->foreignId('value_id')->nullable()->after('parent_id')->constrained('values')->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('specifications', function (Blueprint $table) {
            $table->dropForeign(['value_id']);
            $table->dropColumn('value_id');
        });
        Schema::dropIfExists('values');
        Schema::dropIfExists('specifications');
    }
};
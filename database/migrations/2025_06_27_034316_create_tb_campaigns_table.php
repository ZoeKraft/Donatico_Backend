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
        Schema::create('tb_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('img');
             $table->string('name')->unique();
            $table->string('description');
            $table->string('location');
            $table->foreignId('categories_id')->constrained('tb_categories')->onDelete('cascade');
            $table->foreignId('types_id')->constrained('tb_types')->onDelete('cascade');
            $table->decimal('amount',20,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_campaigns');
    }
};

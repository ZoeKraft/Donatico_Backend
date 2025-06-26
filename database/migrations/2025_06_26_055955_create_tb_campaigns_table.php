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
            $table->string('img',50);
            $table->string('name',30);
            $table->string('description',150);
            $table->string('location',30);
            $table->string('category',15);
            $table->string('type',30);
            $table->decimal('amount',20,2);
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

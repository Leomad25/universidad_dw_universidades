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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            
            $table->string('nit')->nullable(false)->unique();
            $table->string('name')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('email')->nullable(false);
            $table->date('date')->nullable(false);
            $table->integer('phone')->nullable(false);
            $table->integer('max_rooms')->nullable(false);

            $table->unique(['nit', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};

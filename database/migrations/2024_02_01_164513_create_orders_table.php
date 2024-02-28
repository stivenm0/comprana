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
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('dispatcher_id')->nullable();
            $table->foreignId('cart_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('status', ['Procesando', 'En Camino', 'Entregado', 'No Entregado', 'Cancelado'])->default('Procesando');
            $table->decimal('total');
            $table->string('invoice');
            $table->string('address');
            $table->string('phone', 10);

            $table->foreign('dispatcher_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
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

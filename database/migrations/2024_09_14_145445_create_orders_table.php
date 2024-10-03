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
            $table->unsignedBigInteger('user_id'); // pemesan
            $table->string('driver')->nullable();  // Nama driver
            $table->decimal('fuel_consumption', 8, 2)->nullable();  // Konsumsi BBM
            $table->date('service_schedule')->nullable();  // Jadwal Service
            $table->text('usage_history')->nullable();  // Riwayat Pemakaian
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->unsignedBigInteger('atasan_id')->nullable();  // Atasan yang menyetujui
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

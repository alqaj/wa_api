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
        Schema::create('permintaan_supports', function (Blueprint $table) {
            $table->id();
            $table->string('detail', 100);
            $table->string('pembuat', 30);
            $table->date('tgl_dibuat');
            $table->date('tgl_harus_selesai');
            $table->date('tgl_selesai')->nullable();
            $table->string('status', 15)->default('dibuat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_supports');
    }
};

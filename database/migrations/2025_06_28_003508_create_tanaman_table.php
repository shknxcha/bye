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
    Schema::create('tanaman', function (Blueprint $table) {
        $table->id();
        $table->foreignId('jenis_tanaman_id')->constrained('jenis_tanaman')->onDelete('cascade');
        $table->float('suhu_udara');
        $table->float('kelembapan_udara');
        $table->float('suhu_tanah');
        $table->float('kelembapan_tanah');
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanaman');
    }
};
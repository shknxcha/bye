<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('jenis_tanaman', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->integer('suhu_tanah_max');
        $table->integer('suhu_tanah_min');
        $table->integer('kelembapan_tanah_max');
        $table->integer('kelembapan_tanah_min');
        $table->integer('suhu_udara_max');
        $table->integer('suhu_udara_min');
        $table->integer('kelembapan_udara_max');
        $table->integer('kelembapan_udara_min');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_tanaman');
    }
};

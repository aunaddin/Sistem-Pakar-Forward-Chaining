<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diagnosa', function (Blueprint $table) {

            $table->id();

            $table->string('nama_pasien');

            $table->text('alamat');

            $table->foreignId('penyakit_id')
                ->nullable()
                ->constrained('penyakit')
                ->nullOnDelete();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diagnosa');
    }
};
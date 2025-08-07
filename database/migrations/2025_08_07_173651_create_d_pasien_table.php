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
        Schema::create('d_pasien', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('rs_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('telepon', 15)->nullable();
            $table->string('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_pasien');
    }
};

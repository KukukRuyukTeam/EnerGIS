<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembangkits', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->string('nama', 255)->nullable(false);
            $table->float('latitude')->nullable(false);
            $table->float('longitude')->nullable(false);
            $table->string('lokasi', 255)->nullable();
            $table->string('deskripsi', 2500)->nullable();
            $table->float('kapasitas')->nullable();
            $table->string('gambar', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembangkits');
    }
};

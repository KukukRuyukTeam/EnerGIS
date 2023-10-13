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
        Schema::create('spklu', function (Blueprint $table) {
            $table->uuid("id")->default(DB::raw('uuid_generate_v4()'))->primary();
            $table->string('nama')->nullable(false);
            $table->string('lokasi')->nullable();
            $table->float('latitude')->nullable(false);
            $table->float('longitude')->nullable(false);
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        Schema::table('spklu', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spklu');
    }
};

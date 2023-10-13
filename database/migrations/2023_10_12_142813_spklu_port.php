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
        Schema::create('spklu_port', function (Blueprint $table) {
            $table->uuid("id")->default(DB::raw('uuid_generate_v4()'))->primary();

            $table->uuid('id_spklu')->nullable()->unsigned()->index();
            $table->foreign('id_spklu')->references('id')->on('spklu')->onDelete('cascade');

            $table->string('tipe')->nullable(false);
            $table->integer('daya')->nullable();
            $table->integer('jumlah')->nullable(false)->default(1);

            $table->timestamps();
        });

        Schema::table('spklu_port', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spklu_port');
    }
};

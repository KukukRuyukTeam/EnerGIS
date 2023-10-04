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
        Schema::create('pltas', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('uuid_generate_v4()'))->primary();

            $table->uuid('id_pl')->unsigned()->index();
            $table->foreign('id_pl')->references('id')->on('pembangkits')->onDelete('cascade');

            $table->string('tipe_pembangkit')->nullable();
            $table->string('unit_pembangkit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pltas');
    }
};

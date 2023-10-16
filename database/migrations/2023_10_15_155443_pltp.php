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
        Schema::create('pltp', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('uuid_generate_v4()'))->primary();

            $table->uuid('id_pl')->nullable()->unsigned()->index();
            $table->foreign('id_pl')->references('id')->on('pembangkit')->onDelete('cascade');

            $table->string('tipe_pembangkit')->nullable();
            $table->string('unit_pembangkit')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pltp');
    }
};

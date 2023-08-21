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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personne_id')->nullable();
            $table->string('livres_id')->nullable();
            $table->foreign('personne_id')->references('id')->on('personnes');
            $table->foreign('livres_id')->references('isbn')->on('livres');
            $table->date('dateLocation');
            $table->unique(['personne_id','livres_id','dateLocation']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};

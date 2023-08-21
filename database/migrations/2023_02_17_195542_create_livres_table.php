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
        Schema::create('livres', function (Blueprint $table) {
            $table->string('isbn')->unique();
            $table->string('titre');
            $table->string('offreby');
            $table->date('date_ajout');
            $table->float('prix');
            $table->unsignedBigInteger('personne_id');
            $table->unsignedBigInteger('theme_id');
            $table->foreign('personne_id')->references('id')->on('personnes');
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};

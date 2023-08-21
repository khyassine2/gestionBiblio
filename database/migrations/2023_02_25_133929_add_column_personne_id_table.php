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
        Schema::table('temp_livres', function($table) {
            $table->bigInteger('personne_id')->nullable()->after('offreby');
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('temp_livres', function($table) {
            $table->dropColumn('personne_id');
        });
    }
};

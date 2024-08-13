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
        Schema::table('property_photos', function (Blueprint $table) {
            //
            $table->renameColumn('propriete_id', 'property_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('property_photos', function (Blueprint $table) {
            //
            $table->renameColumn('property_id', 'propriete_id');
        });
    }
};

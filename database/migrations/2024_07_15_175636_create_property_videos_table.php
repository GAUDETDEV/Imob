<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propriete_id');
            $table->string('titre_video');
            $table->string('description_video')->nullable();
            $table->string('file_path_video');
            $table->timestamps();

            // Définir la clé étrangère avec la table properties
            $table->foreign('propriete_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_videos');
    }
};

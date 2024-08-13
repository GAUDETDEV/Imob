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
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('agent_id');
            $table->string('type'); // ex: vente, location
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->integer('montant');
            $table->string('statut'); // ex: actif, terminé, annulé
            $table->text('description')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrats');
    }
};

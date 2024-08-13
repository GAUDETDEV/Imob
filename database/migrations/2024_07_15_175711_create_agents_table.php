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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('adresse');
            $table->string('ville');
            $table->string('code_postal');
            $table->date('date_naissance')->nullable();
            $table->string('sexe')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('numero_identification')->nullable();
            $table->text('biographie')->nullable();
            $table->string('photo_profil')->nullable();
            $table->string('specialite')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
};

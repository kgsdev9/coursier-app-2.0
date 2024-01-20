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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('photo');
            $table->string('matricule');
            $table->string('identifiant_permanent')->nullable();
            $table->string('telephone');
            $table->string('contact')->nullable();
            $table->string('serie');
            $table->integer('point_bac');
            $table->string('date_naissance');
            $table->string('lieu_naissance');
            $table->string('centre_composition');
            $table->string('numero_table')->nullable();
            $table->string('ville_composition');
            $table->string('numero_bts')->nullable();
            $table->string('ecole_origine');
            $table->string('sexe');
            $table->string('status')->nullable();
            $table->unsignedBigInteger('etat')->default('0');
            $table->unsignedBigInteger('typecandidature_id')->nullable();
            $table->unsignedBigInteger('filiere_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('nationalite_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nationalite_id')->references('id')->on('nationnalites')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('typecandidature_id')->references('id')->on('type_candidatures')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};

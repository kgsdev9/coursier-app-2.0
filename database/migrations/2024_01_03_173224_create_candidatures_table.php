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
            $table->string('email')->unique();
            $table->string('photo');
            $table->string('matricule')->unique();
            $table->string('identifiant_permanent')->nullable();
            $table->string('telephone');
            $table->string('serie');
            $table->string('centre_composition');
            $table->string('ville_composition');
            $table->string('numero_bts')->nullable();
            $table->string('mention');
            $table->string('point_bac');
            $table->string('ecole_origine');
            $table->string('sexe');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('nationalite_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nationalite_id')->references('id')->on('nationnalites')->onDelete('CASCADE')->onUpdate('CASCADE');
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

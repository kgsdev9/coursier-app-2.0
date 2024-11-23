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
        Schema::create('t_extraits', function (Blueprint $table) {
            $table->id();
            $table->string('n_registre');
            $table->string('document');
            $table->string('nom_complet')->nullable();
            $table->string('adresse')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('modelivraison_id')->nullable();
            $table->unsignedBigInteger('commune_id');
            $table->unsignedBigInteger('prixservice_id')->nullable();
            $table->string('codecommande')->unique();
            $table->integer('montanttva')->nullable();
            $table->string('montanttc');
            $table->string('qtecmde');
            $table->date('datelivreprevu')->nullable();
            $table->enum('status', ['1', '2', '3', '4', '5','6']);
            $table->integer('prixservice')->nullable();
            $table->foreign('commune_id')->references('id')->on('t_communes');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('prixservice_id')->references('id')->on('prix_servivces');
            $table->foreign('modelivraison_id')->references('id')->on('t_mode_livraisons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_extraits');
    }
};

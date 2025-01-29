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
            $table->integer('qtecmde');
            $table->string('telephone');
            $table->string('libellemodelivraison');
            $table->unsignedBigInteger('commune_id');
            $table->decimal('montantservice', 10, 2);
            $table->string('codecommande');
            $table->decimal('montanttva', 10, 2);
            $table->decimal('montanttc', 10, 2);
            $table->string('fullname');
            $table->decimal('prixservice', 10, 2);
            $table->dateTime('datelivreprevu');
            $table->string('adresse');
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->foreign('commune_id')->references('id')->on('t_communes')->onDelete('cascade');
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

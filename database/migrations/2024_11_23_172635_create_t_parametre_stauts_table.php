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
        Schema::create('t_parametre_stauts', function (Blueprint $table) {
            $table->id();
            $table->string('typestatut');
            $table->integer('codeintparametre');
            $table->string('libellestatut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_parametre_stauts');
    }
};

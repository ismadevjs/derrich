<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('athletes', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->date('date_naissance');
            $table->integer('age');
            $table->string('pays', 100);
            $table->string('wilaya', 100);
            $table->foreignId('club_id')->constrained()->onDelete('cascade');
            $table->string('poids', 50);
            $table->string('categorie', 50);
            $table->string('rapport_medical_pdf')->nullable();
            $table->string('cardiovasculaire', 100)->nullable();
            $table->string('groupage', 10);
            $table->string('medical_status', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('athletes');
    }
};

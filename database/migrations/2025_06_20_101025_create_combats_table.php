<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('combats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id')->constrained()->onDelete('cascade');
            $table->foreignId('athlete1_id')->constrained('athletes')->onDelete('cascade');
            $table->foreignId('athlete2_id')->constrained('athletes')->onDelete('cascade');
            $table->foreignId('vainqueur_id')->nullable()->constrained('athletes')->onDelete('set null');
            $table->time('heure');
            $table->string('resultat', 255)->nullable();
            $table->text('performance')->nullable();
            $table->string('type_combat', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('combats');
    }
};

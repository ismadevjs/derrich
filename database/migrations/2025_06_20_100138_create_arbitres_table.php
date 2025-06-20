<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arbitres', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('pays', 100);
            $table->string('wilaya', 100);
            $table->foreignId('club_id')->constrained()->onDelete('cascade');
            $table->string('groupage', 10);
            $table->string('niveau', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arbitres');
    }
};

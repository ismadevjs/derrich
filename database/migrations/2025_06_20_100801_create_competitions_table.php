<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->dateTime('date');
            $table->foreignId('salle_id')->constrained()->onDelete('cascade');
            $table->foreignId('tapis_id')->constrained()->onDelete('cascade');
            $table->foreignId('arbitre_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};

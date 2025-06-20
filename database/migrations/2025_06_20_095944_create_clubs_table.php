<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('wilaya', 100);
            $table->text('adresse');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};

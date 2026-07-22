<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sourates', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('numero')->unique();
            $table->string('nom_arabe');
            $table->string('nom_francais');
            $table->unsignedSmallInteger('nombre_versets');
            $table->enum('revelation', ['Mecquoise', 'Medinoise']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sourates');
    }
};

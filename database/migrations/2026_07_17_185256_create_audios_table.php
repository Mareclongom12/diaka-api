<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sourate_id')->constrained()->cascadeOnDelete();
            $table->foreignId('reciter_id')->constrained()->cascadeOnDelete();
            $table->string('url');
            $table->unsignedInteger('duree')->nullable();
            $table->timestamps();

            $table->unique(['sourate_id', 'reciter_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audios');
    }
};

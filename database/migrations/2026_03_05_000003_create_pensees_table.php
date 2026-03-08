<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * ADZ: creation de la table pensees (id + contenu + timestamps).
     */
    public function up(): void
    {
        Schema::create('pensees', function (Blueprint $table) {
            $table->id();
            $table->text('contenu');
            $table->timestamps();
        });
    }

    /**
     * ADZ: rollback de la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('pensees');
    }
};

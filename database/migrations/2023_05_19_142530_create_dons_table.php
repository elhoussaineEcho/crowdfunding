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
        Schema::create('dons', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('idDonnateur')->constrained('donnateurs')->cascadeOnDelete;
            $table->foreignId('idProjet')->constrained('projets')->cascadeOnDelete;
            $table->decimal('prix_don');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dons');
    }
};

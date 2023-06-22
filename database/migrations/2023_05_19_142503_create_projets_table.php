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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->date('datefinal');
            $table->decimal('budget');
            $table->decimal('total')->default(0.0);
            $table->boolean('is_active')->default(0);
            $table->mediumText('description_det');
            $table->foreignId('idCategorie')->constrained('categories')->cascadeOnDelete;
            $table->foreignId('idPorteur')->constrained('porteurs')->cascadeOnDelete;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};

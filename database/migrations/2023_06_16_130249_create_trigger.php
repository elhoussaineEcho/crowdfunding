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
        DB::unprepared('
        CREATE TRIGGER update_sum
AFTER INSERT ON dons
FOR EACH ROW
UPDATE projets p
   SET p.total = 
    (SELECT SUM(prix_don) 
       FROM dons
      WHERE idProjet= p.id)
 WHERE p.id = NEW.idProjet;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
DB::unprepared('DROP TRIGGER `update_sum`');
    }
};

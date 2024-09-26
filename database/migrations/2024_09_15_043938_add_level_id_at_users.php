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
        Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'level_id')) {
            $table->bigInteger('level_id')->unsigned()->nullable()->after('id');
            $table->foreign('level_id')->references('id')->on('levels')
                ->onDelete('set null')
                ->onUpdate('cascade');
        }
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        // Asegurarse de que la clave foránea y la columna sean eliminadas correctamente
        if (Schema::hasColumn('users', 'level_id')) {
            $table->dropForeign(['level_id']);
            $table->dropColumn('level_id');
        }
        });

      // Luego eliminar la tabla levels
      Schema::dropIfExists('levels');
    }
};
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnIsSuperadministradorInUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', static function(Blueprint $table) {
            $table->renameColumn('is_superadministrador', 'is_administrador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', static function(Blueprint $table) {
            $table->renameColumn('is_administrador', 'is_superadministrador');
        });
    }
}

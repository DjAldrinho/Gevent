<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnIsSuperadministradorInUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', static function (Blueprint $table) {
            $table->boolean('is_superadministrador')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', static function (Blueprint $table) {
            $table->dropColumn('is_superadministrador');
        });
    }
}

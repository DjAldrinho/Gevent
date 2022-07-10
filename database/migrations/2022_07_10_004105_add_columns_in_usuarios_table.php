<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', static function (Blueprint $table) {
            $table->string('avatar')->nullable();
            $table->string('cargo')->nullable();
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
            $table->dropColumn('avatar');
            $table->dropColumn('cargo');
        });
    }
}

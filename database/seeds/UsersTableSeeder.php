<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombres' => 'Super',
            'apellidos' => 'Administrador',
            'email' => 'admin@gevent.com',
            'password' => bcrypt('gevent*2022'),
            'is_superadministrador' => true,
            'is_administrador' => false,
            'fecha_nacimiento' => Carbon::create(2022, 12, 24),
        ]);
    }
}

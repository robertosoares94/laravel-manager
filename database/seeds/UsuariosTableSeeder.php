<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'id' => 1,
            'nome' => 'Nome',
            'email' => 'exemple@mail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}

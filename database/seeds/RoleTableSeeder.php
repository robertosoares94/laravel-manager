<?php

use App\Role;
use App\Usuario;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =  [
            [
                'id' => 1,
                'name' => 'Administrador',
                'display_name' => 'Permissão total',
                'description' => 'Usuário possui total permissão no sistema'
            ]
        ];
        $usuario = Usuario::find(1);

        foreach ($roles as $key => $value) {
            $role =   Role::create($value);
            $usuario->roles()->attach( $role);
        }

    }
}

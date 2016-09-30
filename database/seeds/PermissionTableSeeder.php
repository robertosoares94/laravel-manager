<?php

use App\Permission;
use App\Role;
use App\Usuario;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'role-list',
                'display_name' => 'Listagem de permissões',
                'description' => ''
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Criar permissão',
                'description' => ''
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Editar permissão',
                'description' => ''
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Deletar permissão',
                'description' => ''
            ],
            [
                'name' => 'usuario-list',
                'display_name' => 'Listagem de usuarios',
                'description' => ''
            ],
            [
                'name' => 'usuario-create',
                'display_name' => 'Criar Usuario',
                'description' => ''
            ],
            [
                'name' => 'usuario-edit',
                'display_name' => 'Editar Usuario',
                'description' => ''
            ],
            [
                'name' => 'usuario-delete',
                'display_name' => 'Deletar Usuario',
                'description' => ''
            ]
        ];
        Permission::truncate();
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}

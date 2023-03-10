<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   // operaciones sobre tabla roles
        $permisos=[
        /*
        'ver-rol',
        'crear-rol',
        'editar-rol',
        'borrar-rol',

        //operaciones tabla dashboard
        'ver-dashboard',
        'crear-dashboard',
        'editar-dashboard',
        'borrar-dashboard',
*/
        //operaciones tabla usuarios
        'ver-usuario',
        'crear-usuario',
        'editar-usuario',
        'borrar-usuario'
        ];

        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}

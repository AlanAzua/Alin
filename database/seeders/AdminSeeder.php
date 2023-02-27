<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {/*
        $usuario=User::create([
            'name'=> 'mm',
            'email'=> 'mm@gmail.com',
            'password'=> bcrypt('123456789')

        ]);*/

        //$rol=Role::create(['name'=> 'Administrador']);
        //$permisos= Permission::pluck('id', 'id')->all();
        //$rol->syncPermissions($permisos);
        //$usuario->syncPermissions('ver-usuario', 'ver-rol');
        $rol=Role::create(['name'=> 'visualizador']);
        $rol->syncPermissions('ver-usuario', 'ver-rol');
    }
}

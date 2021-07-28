<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Espacio;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Urbanizacion::factory(10)->create();

        $espacio1=new Espacio();
        $espacio1->nombre='Clic para borrar';
        $espacio1->color='bg-white';
        $espacio1->save();

        $espacio2=new Espacio();
        $espacio2->nombre='Sala/Comedor';
        $espacio2->color='bg-danger';
        $espacio2->save();

        $espacio3=new Espacio();
        $espacio3->nombre='Cocina';
        $espacio3->color='bg-success';
        $espacio3->save();

        $espacio4=new Espacio();
        $espacio4->nombre='Dormitorio';
        $espacio4->color='bg-secondary';
        $espacio4->save();

        $espacio5=new Espacio();
        $espacio5->nombre='Baño';
        $espacio5->color='bg-info';
        $espacio5->save();

        $espacio6=new Espacio();
        $espacio6->nombre='Otro (techado)';
        $espacio6->color='bg-purple';
        $espacio6->save();

        $espacio7=new Espacio();
        $espacio7->nombre='Otro/Ninguno (sin techar)';
        $espacio7->color='bg-warning';
        $espacio7->save();

    }
}

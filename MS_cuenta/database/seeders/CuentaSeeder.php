<?php

namespace Database\Seeders;

use App\Models\Cuenta;
use Illuminate\Database\Seeder;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuenta = new Cuenta();
        $cuenta->idUsuario = 1;
        $cuenta->ruta = '';
        $cuenta->nombre = 'Luis Rodrigo';
        $cuenta->apellidos = 'Fajardo Sondón';
        $cuenta->email = 'admin@admin.com';
        $cuenta->telefono = '1122334455';
        $cuenta->genero = 'Masculino';
        $cuenta->info = 'Info prueba user 1';
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->idUsuario = 2;
        $cuenta->ruta = '';
        $cuenta->nombre = 'Alejandro';
        $cuenta->apellidos = 'Ortega';
        $cuenta->email = 'admin1@admin.com';
        $cuenta->telefono = '1122334455';
        $cuenta->genero = 'Masculino';
        $cuenta->info = 'Info prueba user 1';
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->idUsuario = 3;
        $cuenta->ruta = '';
        $cuenta->nombre = 'Cesar';
        $cuenta->apellidos = 'Alejo';
        $cuenta->email = 'admin2@admin.com';
        $cuenta->telefono = '1122334455';
        $cuenta->genero = '';
        $cuenta->info = 'Info prueba user 1';
        $cuenta->save();
    }
}

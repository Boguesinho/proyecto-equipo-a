<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->username = 'boguesinho';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();

        $usuario = new User();
        $usuario->username = 'ale123';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();

        $usuario = new User();
        $usuario->username = 'cesar10';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();

    }
}

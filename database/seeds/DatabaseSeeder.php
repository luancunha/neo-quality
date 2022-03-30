<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome' => 'admin',
            'email' => 'admin@admin.com',
            'senha' => Hash::make('@dmin01'),
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('@dmin01'),
            'cod_usuario' => 1,
        ]);

        DB::table('usuarios')->insert([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'senha' => Hash::make('teste'),
        ]);
        DB::table('users')->insert([
            'name' => 'teste',
            'email' => 'teste@teste.com',
            'password' => Hash::make('teste'),
            'cod_usuario' => 2,
        ]);
    }
}

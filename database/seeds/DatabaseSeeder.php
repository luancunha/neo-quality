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

        DB::table('internacaos')->insert([
            'nome' => 'Enzo Gabriel Santos',
            'mae' => 'Maria Helena Santos',
            'sexo' => 'Masculino',
            'tipo_parto' => 'Normal',
            'tmp_gestacao' => '35',
            'peso' => 1500,
            'tamanho' => 40,
            'leito' => 00001,
            'dt_internacao' => '2021-01-03',
        ]);
        DB::table('internacaos')->insert([
            'nome' => 'Augusto Martins Cunha',
            'mae' => 'Mariana Martins Almeida Cunha',
            'sexo' => 'Masculino',
            'tipo_parto' => 'Normal',
            'tmp_gestacao' => '38',
            'peso' => 1300,
            'tamanho' => 36,
            'leito' => 00004,
            'dt_internacao' => '2021-05-01',
        ]);
        DB::table('internacaos')->insert([
            'nome' => 'Valentina Costa Mendes',
            'mae' => 'Carla Cristina Mendes',
            'sexo' => 'Feminino',
            'tipo_parto' => 'Normal',
            'tmp_gestacao' => '33',
            'peso' => 1200,
            'tamanho' => 32,
            'leito' => 00003,
            'dt_internacao' => '2021-02-16',
        ]);
        DB::table('internacaos')->insert([
            'nome' => 'Luísa Martins Cunha',
            'mae' => 'Mariana Martins Almeida Cunha',
            'sexo' => 'Feminino',
            'tipo_parto' => 'Cesária',
            'tmp_gestacao' => '40',
            'peso' => 1500,
            'tamanho' => 35,
            'leito' => 00002,
            'dt_internacao' => '2021-03-05',
        ]);

    }
}

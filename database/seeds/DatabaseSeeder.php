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
            'peso' => 1200,
            'tamanho' => 30,
            'leito' => 00001,
            'dt_internacao' => '2021-01-03',
        ]);
        DB::table('internacaos')->insert([
            'nome' => 'Augusto Pedro Silva',
            'mae' => 'Diane Silva Barbosa',
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
            'tipo_parto' => 'Cesária',
            'tmp_gestacao' => '33',
            'peso' => 1200,
            'tamanho' => 32,
            'leito' => 00003,
            'dt_internacao' => '2021-02-16',
        ]);
        DB::table('internacaos')->insert([
            'nome' => 'Luísa Martins Cunha',
            'mae' => 'Marta Martins Santos',
            'sexo' => 'Feminino',
            'tipo_parto' => 'Cesária',
            'tmp_gestacao' => '40',
            'peso' => 1500,
            'tamanho' => 35,
            'leito' => 00002,
            'dt_internacao' => '2021-03-05',
        ]);
        DB::table('internacaos')->insert([
            'nome' => 'Arthur Silva Moura',
            'mae' => 'Thaís Santos Moura',
            'sexo' => 'Masculino',
            'tipo_parto' => 'Cesária',
            'tmp_gestacao' => '37',
            'peso' => 1400,
            'tamanho' => 34,
            'leito' => 00005,
            'dt_internacao' => '2021-04-05',
        ]);
        DB::table('internacaos')->insert([
            'nome' => 'Pedro Moura Lourenço',
            'mae' => 'Bianca Mendes Lourenço',
            'sexo' => 'Masculino',
            'tipo_parto' => 'Normal',
            'tmp_gestacao' => '37',
            'peso' => 1200,
            'tamanho' => 32,
            'leito' => 00006,
            'dt_internacao' => '2021-06-12',
        ]);
        DB::table('internacaos')->insert([
            'nome' => 'Brenda Vasconcelos Silva',
            'mae' => 'Maria Vasconcelos Peixoto',
            'sexo' => 'Feminino',
            'tipo_parto' => 'Cesária',
            'tmp_gestacao' => '33',
            'peso' => 1300,
            'tamanho' => 33,
            'leito' => 00007,
            'dt_internacao' => '2021-05-22',
        ]);

        DB::table('dados_internacaos')->insert([
            'cod_internacao' => 1,
            'data' => '2021-01-04',
            'peso' => '1200',
            'tamanho' => '31',
            'boo_sufarctante' => 0,
            'sufarctante' => NULL,
            'antibiotico' => 0,
            'infec_bacte' => 0,
            'infec_noso' => 0,
            'infec_fung' => 0,
            'hemo_intra' => 0,
            'entero_necro' => 0,
        ]);
        DB::table('dados_internacaos')->insert([
            'cod_internacao' => 1,
            'data' => '2021-01-05',
            'peso' => '1250',
            'tamanho' => '31',
            'boo_sufarctante' => 0,
            'sufarctante' => NULL,
            'antibiotico' => 0,
            'infec_bacte' => 0,
            'infec_noso' => 0,
            'infec_fung' => 0,
            'hemo_intra' => 0,
            'entero_necro' => 0,
        ]);
        DB::table('dados_internacaos')->insert([
            'cod_internacao' => 1,
            'data' => '2021-01-06',
            'peso' => '1300',
            'tamanho' => '33',
            'boo_sufarctante' => 0,
            'sufarctante' => NULL,
            'antibiotico' => 0,
            'infec_bacte' => 0,
            'infec_noso' => 0,
            'infec_fung' => 1,
            'hemo_intra' => 0,
            'entero_necro' => 0,
        ]);
        DB::table('dados_internacaos')->insert([
            'cod_internacao' => 1,
            'data' => '2021-01-07',
            'peso' => '1300',
            'tamanho' => '33',
            'boo_sufarctante' => 0,
            'sufarctante' => NULL,
            'antibiotico' => 0,
            'infec_bacte' => 1,
            'infec_noso' => 0,
            'infec_fung' => 0,
            'hemo_intra' => 0,
            'entero_necro' => 0,
        ]);
        DB::table('dados_internacaos')->insert([
            'cod_internacao' => 1,
            'data' => '2021-01-08',
            'peso' => '1400',
            'tamanho' => '34',
            'boo_sufarctante' => 0,
            'sufarctante' => NULL,
            'antibiotico' => 0,
            'infec_bacte' => 0,
            'infec_noso' => 1,
            'infec_fung' => 0,
            'hemo_intra' => 0,
            'entero_necro' => 0,
        ]);


    }
}

<?php

namespace App\Http\Controllers;

use App\Internacao;
use App\Resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internacoes = Internacao::all();
        return view('resultados.index', compact('internacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $sexo = $request->sexo;
        $taxa_infBac = $request->taxa_infBac;
        $taxa_infFun = $request->taxa_infFun;
        $taxa_infNeo = $request->taxa_infNeo;
        $taxa_obi = $request->taxa_obi;
        $data_ini = $request->data_ini;
        $data_fim = $request->data_fim;

        $r[0] = rand(0, 255);
        $r[1] = rand(0, 255);
        $r[2] = rand(0, 255);
        $r[3] = 0.2;
        $rb[3] = 1;
        $cores = collect("rgba($r[0],$r[1],$r[2],$r[3])",);
        $coresb = collect("rgba($r[0],$r[1],$r[2],$rb[3])",);

        for ($i = 0; $i < 10; $i++) {
            $r[0] = rand(0, 255);
            $r[1] = rand(0, 255);
            $r[2] = rand(0, 255);
            $r[3] = 0.2;

            $cores->push("rgba($r[2],$r[0],$r[1],$r[3])",);
            $coresb->push("rgba($r[2],$r[0],$r[1],$rb[3])",);
        }

        $nulldata = DB::table('internacaos')->whereDate('updated_at', '>=', $data_ini)->first();
        if ($nulldata == null) {
            $title = Null;
            $label = Null;
            $data = Null;
            $title2 = Null;
            $label2 = Null;
            $data2 = Null;
            $data3 = Null;
            return view('resultados.search', compact('title', 'label', 'data', 'nulldata', 'title2', 'label2', 'data2', 'data3', 'cores', 'coresb',))->with('success', 'Nenhum dado encontrado!');
        }

        if ($taxa_obi == 1 && $sexo == 1) {
            $alta = DB::table('internacaos')->where('status', 2)->whereDate('updated_at', '>=', $data_ini)->whereDate('updated_at', '<=', $data_fim)->count();
            $obit = DB::table('internacaos')->where('status', 3)->whereDate('updated_at', '>=', $data_ini)->whereDate('updated_at', '<=', $data_fim)->count();
            $title = 'Taxa de Óbitos';
            $label = collect(['Altas', 'Óbitos']);
            $data = collect([$alta, $obit]);

            $title2 = 'Taxa de Infecções';
            $label2 = collect();
            $data2 = collect();

            $diferenca = strtotime($data_fim) - strtotime($data_ini);
            $quan_dias = floor($diferenca / (60 * 60 * 24)); 

            $data3 = collect();

            if ($taxa_infBac == 1) {
                $infBac = DB::table('dados_internacaos')->whereDate('data', '>=', $data_ini)->whereDate('data', '<=', $data_fim)->sum('infec_bacte');
                $label2->push('Infecçao Bacteriana',);
                $infBac = intval($infBac);
                $data2->push($infBac,);
                $data3->push($quan_dias,);
            } 
            
            if ($taxa_infFun == 1) {
                $infFun = DB::table('dados_internacaos')->whereDate('data', '>=', $data_ini)->whereDate('data', '<=', $data_fim)->sum('infec_fung');
                $label2->push('Infecçao Fúngica',);
                $infFun = intval($infFun);
                $data2->push($infFun,);
                $data3->push($quan_dias,);
            }

            if ($taxa_infFun == 1) {
                $infFun = DB::table('dados_internacaos')->whereDate('data', '>=', $data_ini)->whereDate('data', '<=', $data_fim)->sum('infec_fung');
                $label2->push('Infecçao Nosocomial',);
                $infFun = intval($infFun);
                $data2->push($infFun,);
                $data3->push($quan_dias,);
            }

            return view('resultados.search', compact('cores', 'coresb', 'title', 'label', 'data', 'title2', 'label2', 'data2', 'data3',));
        }

        if ($taxa_obi == 1 && $sexo == 2) {
            $alta = DB::table('internacaos')->where('status', 2)->where('sexo', 'Feminino')->whereDate('updated_at', '>=', $data_ini)->whereDate('updated_at', '<=', $data_fim)->count();
            $obit = DB::table('internacaos')->where('status', 3)->where('sexo', 'Feminino')->whereDate('updated_at', '>=', $data_ini)->whereDate('updated_at', '<=', $data_fim)->count();
            $title = 'Taxa de Óbitos';
            $label = collect(['Altas', 'Óbitos']);
            $data = collect([$alta, $obit]);
            return view('resultados.search', compact('title', 'label', 'data'));
        }

        if ($taxa_obi == 1 && $sexo == 3) {
            $alta = DB::table('internacaos')->where('status', 2)->where('sexo', 'Masculino')->whereDate('updated_at', '>=', $data_ini)->whereDate('updated_at', '<=', $data_fim)->count();
            $obit = DB::table('internacaos')->where('status', 3)->where('sexo', 'Masculino')->whereDate('updated_at', '>=', $data_ini)->whereDate('updated_at', '<=', $data_fim)->count();
            $title = 'Taxa de Óbitos';
            $label = collect(['Altas', 'Óbitos']);
            $data = collect([$alta, $obit]);

            return view('resultados.search', compact('title', 'label', 'data'));
        }
    }
}

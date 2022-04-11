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
        $taxa_infFun = $request->taxa_infFun;
        $taxa_infNeo = $request->taxa_infNeo;
        $taxa_obi = $request->taxa_obi;
        $data_ini = $request->data_ini;
        $data_fim = $request->data_fim;

        $nulldata = DB::table('internacaos')->whereDate('updated_at','>=', $data_ini)->first();
        if ($nulldata == null) {
            $title = Null;
            $label = Null;
            $data = Null;
            return view('resultados.search', compact('title', 'label', 'data', 'nulldata'))->with('success', 'Nenhum dado encontrado!');
        }

        if ($taxa_obi == 1) {
            if ($sexo == 1) {
                $alta = DB::table('internacaos')->where('status', 2)->whereDate('updated_at', '>=', $data_ini)->whereDate('updated_at', '<=', $data_fim)->count();
                $obit = DB::table('internacaos')->where('status', 3)->whereDate('updated_at', '>=', $data_ini)->whereDate('updated_at', '<=', $data_fim)->count();
                $title = 'Taxa de Óbitos';
                $label = collect(['Altas', 'Óbitos']);
                $data = collect([$alta, $obit]);
                return view('resultados.search', compact('title', 'label', 'data'));
            }
        }
    }
}

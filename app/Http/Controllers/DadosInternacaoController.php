<?php

namespace App\Http\Controllers;

use App\DadosInternacao;
use App\Internacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DadosInternacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados_internacoes = DadosInternacao::all();
        return view('dados_internacoes.index', compact('dados_internacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dados_internacoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cod_internacao' => 'required',
            'data' => 'required',
            'peso' => 'required|numeric',
            'tamanho' => 'required|numeric',
            'boo_sufarctante' => 'boolean',
            'sufarctante' => 'numeric|nullable',
            'antibiotico' => 'boolean',
            'infec_bacte' => 'boolean',
            'infec_noso' => 'boolean',
            'infec_fung' => 'boolean',
            'hemo_intra' => 'boolean',
            'entero_necro' => 'boolean',
        ]);
        $show = DadosInternacao::create($validatedData);
        return redirect("/dados_internacoes/$request->cod_internacao")->with('success', 'Dados da Internação adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inter = Internacao::findOrFail($id);
        $dados_internacoes = DadosInternacao::where('cod_internacao', $id)->get();

        $count_dias = DB::table('dados_internacaos')->where('cod_internacao', $id)->count();
        $ult_dia = DB::table('dados_internacaos')->where('cod_internacao', $id)->latest('data')->first();

        $infec = DB::table('dados_internacaos')->where('cod_internacao', $id)->sum(DB::raw('infec_bacte + infec_noso + infec_fung'));
        $hemo = DB::table('dados_internacaos')->where('cod_internacao', $id)->sum(DB::raw('hemo_intra'));

        return view('dados_internacoes.show',compact('inter', 'dados_internacoes', 'count_dias', 'ult_dia', 'infec', 'hemo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados_internacoes = DadosInternacao::findOrFail($id);
        return view('dados_internacoes.edit', compact('dados_internacoes'));
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
        $validatedData = $request->validate([
            'country_name' => 'required|max:255',
            'symptoms' => 'required',
            'cases' => 'required|numeric',
        ]);
        DadosInternacao::whereId($id)->update($validatedData);
        return redirect('/dados_internacoes')->with('success', 'Dados de Corona atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados_internacoes = DadosInternacao::findOrFail($id);
        $dados_internacoes->delete();
        return redirect("/dados_internacoes/$dados_internacoes->cod_internacao")->with('success', 'Dados da Internação removido com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Internacao;
use Illuminate\Http\Request;

class InternacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internacoes = Internacao::all();
        return view('internacoes.index', compact('internacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internacoes.create');
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
            'nome' => 'required|max:255',
            'mae' => 'required|max:255',
            'sexo' => 'required|max:255',
            'tipo_parto' => 'required|max:255',
            'tmp_gestacao' => 'required|numeric',
            'peso' => 'required|numeric',
            'leito' => 'required|numeric',
            'tamanho' => 'required|numeric',
            'dt_internacao' => 'required|max:255',
            'status' => '1',
        ]);
        $show = Internacao::create($validatedData);
        return redirect('/internacoes')->with('success', 'Internação adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $internacoes = Internacao::findOrFail($id);
        return view('internacoes.show',compact('internacoes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $internacoes = Internacao::findOrFail($id);
        return view('internacoes.edit', compact('internacoes'));
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
        Internacao::whereId($id)->update($validatedData);
        return redirect('/coronas')->with('success', 'Internação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $internacoes = Internacao::findOrFail($id);
        $internacoes->delete();
        return redirect('/internacoes')->with('success', 'Internação removida com sucesso!');
    }
}

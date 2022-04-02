<?php

namespace App\Http\Controllers;

use App\Estrutura;
use Illuminate\Http\Request;

class EstruturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estruturas = Estrutura::all();
        return view('estruturas.index', compact('estruturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estruturas.create');
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
            'dt_estrutura' => 'required',
            'num_incubadora' => 'required|numeric',
            'num_rns' => 'required|numeric',
            'num_oximetro' => 'required|numeric',
            'num_enfermeiro' => 'required|numeric',
        ]);
        $show = Estrutura::create($validatedData);
        return redirect('/estruturas')->with('success', 'Dados da Estrutura adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estruturas = Estrutura::findOrFail($id);
        return view('estruturas.show',compact('estruturas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estruturas = Estrutura::findOrFail($id);
        return view('estruturas.edit', compact('estruturas'));
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
        Estrutura::whereId($id)->update($validatedData);
        return redirect('/estruturas')->with('success', 'Dados de Corona atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estruturas = Estrutura::findOrFail($id);
        $estruturas->delete();
        return redirect('/estruturas')->with('success', 'Dados de Corona removido com sucesso!');
    }
}

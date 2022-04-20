@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <span>@lang('Resultado / Relatório')</span>
                            <!--
                                                                            <a href="{{ url('usuarios/create') }}" class="btn btn-primary">
                                                                                <i class="fa fa-plus"></i> @lang('Criar Novo')
                                                                            </a>
                                                                        -->
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('resultados.search') }}" class="row gy-2 align-items-center"
                            style="margin: 0 10em;">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Sexo:</label>
                                <div class="col-sm-8 border border-2" style="height: 5.5em; overflow-y: scroll;">

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo"
                                            id="sexo" value="1" checked>
                                        <label class="form-check-label">
                                            Todos
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo"
                                            id="sexo" value="2" disabled>
                                        <label class="form-check-label">
                                            Feminino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo"
                                            id="sexo" value="3" disabled>
                                        <label class="form-check-label">
                                            Masculino
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rns_resultado" class="col-sm-4 col-form-label">Indicador:</label>
                                <div class="col-sm-8 border border-2" style="height: 7em; overflow-y: scroll;">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="taxa_infBac" id="taxa_infBac">
                                        <label class="form-check-label">
                                            Taxa de Infecção Bacteriana
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="taxa_infFun" id="taxa_infFun">
                                        <label class="form-check-label">
                                            Taxa de Infecção Fúngica
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="taxa_infNeo" id="taxa_infNeo">
                                        <label class="form-check-label">
                                            Taxa de Infecção Nesocomial
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="taxa_obi" id="taxa_obi">
                                        <label class="form-check-label">
                                            Taxa de óbitos
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="periodo" class="col-sm-4 col-form-label">Período:</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="data_ini" id="data_ini" max="{{ now()->toDateString('Y-m-d') }}" required>
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="data_fim" id="data_fim" max="{{ now()->toDateString('Y-m-d') }}" required>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Pesquisar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

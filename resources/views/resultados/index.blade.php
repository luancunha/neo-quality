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
                                            id="sexo" value="2">
                                        <label class="form-check-label">
                                            Feminino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo"
                                            id="sexo" value="3">
                                        <label class="form-check-label">
                                            Masculino
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rns_resultado" class="col-sm-4 col-form-label">Indicador:</label>
                                <div class="col-sm-8 border border-2" style="height: 5.5em; overflow-y: scroll;">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="taxa">
                                        <label class="form-check-label">
                                            Taxa de Infecção Fúngica
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="2" id="taxa">
                                        <label class="form-check-label">
                                            Taxa de Infecção Nesocomial
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="3" id="taxa">
                                        <label class="form-check-label">
                                            Taxa de óbitos
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="periodo" class="col-sm-4 col-form-label">Período:</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="inputPassword3">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="inputPassword3">
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

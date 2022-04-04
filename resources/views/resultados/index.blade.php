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

                        <form method="post" action="{{ route('resultados.seacher') }}" class="row gy-2 align-items-center"
                            style="margin: 0 10em;">
                            @csrf

                            <div class="row mb-3">
                                <label for="rns_resultado" class="col-sm-4 col-form-label">Récem-Nascido:</label>
                                <div class="col-sm-8 border border-2" style="height: 8em; overflow-y: scroll;">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Todos
                                        </label>
                                    </div>
                                    @foreach ($internacoes as $inter)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                {{ $inter->nome }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rns_resultado" class="col-sm-4 col-form-label">Sexo:</label>
                                <div class="col-sm-8 border border-2" style="height: 5.5em; overflow-y: scroll;">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                            checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Todos
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Feminino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Masculino
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rns_resultado" class="col-sm-4 col-form-label">Indicador:</label>
                                <div class="col-sm-8 border border-2" style="height: 5.5em; overflow-y: scroll;">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Taxa de Infecção nesocominal
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Taxa de Infecção nesocominal
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Taxa de óbitos
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Período:</label>
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

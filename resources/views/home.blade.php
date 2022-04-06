@extends('layouts.app')

@section('content')
    <h2 style="border-bottom: 1px solid #dee2e6 !important;">Painel</h2>
    <br>
    <div class="row" style="justify-content: center;">
        <div class="col-sm-3">
            <div class="card border-info text-center">
                <div class="card-body">
                    <h5 class="card-title">Internados</h5>
                    <p class="card-text fs-4" style="color: #0d6efd;">{{ $count_inter }} récem-nascidos</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card border-secundary text-center">
                <div class="card-body">
                    <h5 class="card-title">Altas</h5>
                    <p class="card-text fs-4" style="color: rgba(0, 0, 0, 0.5);">{{ $count_alta }} récem-nascidos</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card border-danger text-center">
                <div class="card-body">
                    <h5 class="card-title">Óbitos</h5>
                    <p class="card-text fs-4" style="color: #e3342f;">{{ $count_obito }} récem-nascidos</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="d-grid gap-2 col-3 mx-auto">
            <a class="btn btn-primary btn-lg" href="{{ url('estruturas') }}" role="button">Indicadores de<br>Estrutura</a>
        </div>
        <div class="d-grid gap-2 col-3 mx-auto">
            <a class="btn btn-primary btn-lg" href="{{ url('internacoes') }}" role="button">Indicadores de<br>Internação</a>
        </div>
        <div class="d-grid gap-2 col-3 mx-auto">
            <a class="btn btn-primary btn-lg" href="{{ url('internacoes/create') }}" role="button">Adicionar<br>Internação</a>
        </div>
        <div class="d-grid gap-2 col-3 mx-auto">
            <a class="btn btn-primary btn-lg" href="{{ url('resultados') }}" role="button">Resultado/<br>Relatório</a>
        </div>
    </div>
@endsection

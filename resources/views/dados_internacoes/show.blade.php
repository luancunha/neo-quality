@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between w-100 pb-2">
            <span></span>
            <a href="{{ url('internacoes') }}" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> @lang('Voltar')
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title"><strong>Nome:</strong> {{ $inter->nome }}</h5>
                        <p class="card-text m-0"><strong>Mãe:</strong> {{ $inter->mae }}</p>
                        <p class="card-text m-0"><strong>Sexo:</strong> {{ $inter->sexo }}</p>
                        <p class="card-text m-0"><strong>Leito:</strong> {{ $inter->leito }}</p>
                        <p class="card-text m-0"><strong>Data da Internação:</strong> {{ $inter->dt_internacao }}</p>

                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <span>@lang('Histórico')</span>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>@lang('Nome')</td>
                                    <td>@lang('CRM/COREN')</td>
                                    <td>@lang('E-mail')</td>
                                    <td>@lang('Telefone')</td>
                                    <td>@lang('Ações')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dados_internacoes as $dado)
                                    <tr>
                                        <td>{{ $dado->id }}</td>
                                        <td>{{ $dado->nome }}</td>
                                        <td>{{ number_format($user->crm_coren, 0, ',', '.') }}</td>
                                        <td>{{ $dado->email }}</td>
                                        <td>{{ number_format($dado->telefone, 0, ',', '.') }}</td>
                                        <td>{{ number_format($dado->telefone, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Adicionar
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
@endsection

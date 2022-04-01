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
                                <tr>
                                    <form method="post" action="{{ route('internacoes.store') }}"
                                        class="row gy-2 align-items-center">
                                        @csrf

                                        <td>
                                            <input type="text" class="form-control" name="nome" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="nome" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="nome" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="nome" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="nome" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="nome" />
                                        </td>


                                </tr>
                            </tbody>
                        </table>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

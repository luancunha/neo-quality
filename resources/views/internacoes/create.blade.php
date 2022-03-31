@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <span>@lang('Criar Internação')</span>
                            <a href="{{ url('internacoes') }}" class="btn btn-primary">
                                <i class="fa fa-arrow-left"></i> @lang('Voltar')
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif

                        <form method="post" action="{{ route('internacoes.store') }}" class="row gy-2 align-items-center">
                            @csrf

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control" name="nome" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mae">Mãe:</label>
                                    <input type="text" class="form-control" name="mae" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_parto">Tipo do Parto</label>:</label>
                                    <input type="text" class="form-control" name="tipo_parto" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tmp_gestacao">Tempo de Gestação:</label>
                                    <input type="number" class="form-control" name="tmp_gestacao" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sexo">Sexo:</label>
                                    <input type="text" class="form-control" name="sexo" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="peso">Peso:</label>
                                    <input type="number" class="form-control" name="peso" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tamanho">Tamanho:</label>
                                    <input type="number" class="form-control" name="tamanho" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="leito">Leito</label>:</label>
                                    <input type="number" class="form-control" name="leito" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dt_internacao">Data da Internação:</label>
                                    <input type="date" class="form-control" name="dt_internacao" />
                                </div>
                            </div>

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

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
            <div class="{{ $inter->status == 1 ? 'col-md-12' : 'col-md-4' }}">
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

            @if ($inter->status != 1)
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-text"><strong>Dias de internação:</strong> {{ $count_dias }} dias</h5>
                            <h5 class="card-text"><strong>Peso do último dia:</strong> {{ $ult_dia->peso }} g
                            </h5>
                            <h5 class="card-text"><strong>Tamanho do último dia:</strong> {{ $ult_dia->tamanho }} cm
                            </h5>
                            <h5 class="card-text"><strong>Teve alguma Infecção:</strong> {{ $infec }}
                            </h5>
                            <h5 class="card-text"><strong>Teve alguma Hemorragia:</strong> {{ $hemo }}
                            </h5>

                        </div>
                    </div>
                </div>
            @endif
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
                                    <td>@lang('Data')</td>
                                    <td>@lang('Peso')</td>
                                    <td>@lang('Tamanho')</td>
                                    <td>@lang('Sufarctante')</td>
                                    <td>@lang('Antibiotico')</td>
                                    <td>@lang('Infecção')</td>
                                    <td>@lang('Hemorragia')</td>
                                    @if ($inter->status == 1)
                                        <td colspan="3" class="text-center">@lang('Ações')</td>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dados_internacoes as $dado)
                                    <tr>
                                        <td>{{ $dado->data }}</td>
                                        <td>{{ $dado->peso }}</td>
                                        <td>{{ $dado->tamanho }}</td>
                                        <td>{{ $dado->boo_sufarctante }}</td>
                                        <td>{{ $dado->antibiotico }}</td>
                                        <td>{{ $dado->infec_bacte }}</td>
                                        <td>{{ $dado->hemo_intra }}</td>
                                        @if ($inter->status == 1)
                                            <td class="text-center p-0 align-middle" width="70">
                                                <form action="{{ route('dados_internacoes.destroy', $dado->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($inter->status == 1)
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Adicionar
                                </button>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Dados</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('dados_internacoes.store') }}"
                        class="row gy-2 align-items-center">
                        @csrf

                        <div class="col-md-12" hidden>
                            <div class="form-group">
                                <label for="cod_internacao"></label>
                                <input type="number" class="form-control" name="cod_internacao"
                                    value="{{ $inter->id }}" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="data">Data:</label>
                                <input type="date" class="form-control" name="data" value="<?php echo date('Y-m-d'); ?>" />
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
                                <label for="tamanho">Tamanho</label>:</label>
                                <input type="number" class="form-control" name="tamanho" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="boo_sufarctante">Recebeu Sufarctante:</label>
                                <select class="form-control" name="boo_sufarctante">
                                    <option value=0 selected="selected">Não</option>
                                    <option value=1>Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sufarctante">Com quantas horas:</label>
                                <input type="number" class="form-control" name="sufarctante" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="antibiotico">Antibiotico:</label>
                                <select class="form-control" name="antibiotico">
                                    <option value="0" selected="selected">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="infec_bacte">Infecção Bacteriana:</label>
                                <select class="form-control" name="infec_bacte">
                                    <option value="0" selected="selected">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="infec_noso">Infecção Nesocomial:</label>
                                <select class="form-control" name="infec_noso">
                                    <option value="0" selected="selected">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="infec_fung">Infecção Fúngica:</label>
                                <select class="form-control" name="infec_fung">
                                    <option value="0" selected="selected">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="hemo_intra">Hemorragia Intraventricular:</label>
                                <select class="form-control" name="hemo_intra">
                                    <option value="0" selected="selected">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="entero_necro">Enterocolite:</label>
                                <select class="form-control" name="entero_necro">
                                    <option value="0" selected="selected">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

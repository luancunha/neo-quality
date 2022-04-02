@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <span>@lang('Estrutura')</span>
                            
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
                                    <td style="width: 10em">@lang('Data')</td>
                                    <td>@lang('Quantidade de Incubadoras')</td>
                                    <td>@lang('Quantidade de RNs')</td>
                                    <td>@lang('Quantidade de Oximetros')</td>
                                    <td>@lang('Quantidade de Enfermeiros')</td>
                                    <td colspan="3" class="text-center">@lang('Ações')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estruturas as $estru)
                                    <tr>
                                        <td>{{ $estru->dt_estrutura }}</td>
                                        <td>{{ $estru->num_incubadora }}</td>
                                        <td>{{ $estru->num_rns }}</td>
                                        <td>{{ $estru->num_oximetro }}</td>
                                        <td>{{ $estru->num_enfermeiro }}</td>
                                        <td class="text-center p-0 align-middle" width="70">
                                            <a href="{{ route('estruturas.edit', $estru->id) }}"
                                                class="btn btn-primary btn-sm">@lang('Editar')
                                            </a>
                                        </td>
                                        <td class="text-center p-0 align-middle" width="70">
                                            <form action="{{ route('estruturas.destroy', $estru->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Adicionar
                            </button>
                        </div>

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
                    <form method="post" action="{{ route('estruturas.store') }}" class="row gy-2 align-items-center">
                        @csrf

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dt_estrutura">Data:</label>
                                <input type="date" class="form-control" name="dt_estrutura" value="<?php echo date('Y-m-d'); ?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="num_incubadora">Quantidade de Incubadoras:</label>
                                <input type="number" class="form-control" name="num_incubadora" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="num_rns">Quantidade de RNs:</label>:</label>
                                <input type="number" class="form-control" name="num_rns" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="num_oximetro">Quantidade de Oximetros:</label>
                                <input type="number" class="form-control" name="num_oximetro" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="num_enfermeiro">Quantidade de Enfermeiros:</label>
                                <input type="number" class="form-control" name="num_enfermeiro" />
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

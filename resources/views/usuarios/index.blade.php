@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <span>@lang('Usuários')</span>
                            <a href="{{ url('usuarios/create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> @lang('Criar Novo')
                            </a>
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
                                    <td colspan="3" class="text-center">@lang('Ações')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->nome }}</td>
                                        <td>{{ number_format($user->crm_coren, 0, '.', '.') }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ number_format($user->telefone, 0, ' ', ' ',) }}</td>
                                        <td class="text-center p-0 align-middle" width="70">
                                            <a href="{{ route('usuarios.edit', $user->id) }}"
                                                class="btn btn-primary btn-sm">@lang('Editar')
                                            </a>
                                        </td>
                                        <td class="text-center p-0 align-middle" width="70">
                                            <form action="{{ route('usuarios.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
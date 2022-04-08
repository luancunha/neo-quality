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
                        {{ $search }}
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

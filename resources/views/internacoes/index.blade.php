@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <span>@lang('Internações')</span>
                            <a href="{{ url('internacoes/create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> @lang('Criar Nova')
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="row" style="justify-content: center;">

                            @foreach ($internacoes as $inter)
                                <div class="col-sm-4 mb-4">
                                    <div class="card border-info">
                                        <div class="card-body" style="border-left: 15px solid #0d6efd;">
                                            <h5 class="card-title" style="color: #0d6efd;">{{ $inter->nome }}</h5>
                                            <p class="card-text m-0"><strong>Mãe:</strong> {{ $inter->nome }}</p>
                                            <p class="card-text m-0"><strong>Sexo:</strong> {{ $inter->sexo }}&nbsp&nbsp&nbsp&nbsp&nbsp <strong>Leito:</strong> {{ $inter->leito }}</p>
                                            <p class="card-text m-0"><strong>Data da Internação:</strong> {{ $inter->dt_internacao }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

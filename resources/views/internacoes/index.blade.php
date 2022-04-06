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

                        <div class="pagination justify-content-center">
                            {{ $internacoes->links() }}
                        </div>

                        <div class="row" style="justify-content: center;">

                            @foreach ($internacoes as $inter)
                                <div class="col-sm-4 mb-4">
                                    <div
                                        class="card {{ $inter->status == 1 ? 'border-info' : ($inter->status == 2 ? 'border-secondary' : 'border-danger') }}">
                                        <div class="card-body"
                                            style="border-left: 15px solid {{ $inter->status == 1 ? '#0d6efd' : ($inter->status == 2 ? '#6c757d' : '#e3342f') }}">
                                            <h5 class="card-title"
                                                style="color: {{ $inter->status == 1 ? '#0d6efd' : ($inter->status == 2 ? '#6c757d' : '#e3342f') }}">
                                                {{ $inter->nome }}</h5>
                                            <p class="card-text m-0"><strong>Mãe:</strong> {{ $inter->mae }}</p>
                                            <p class="card-text m-0"><strong>Sexo:</strong>
                                                {{ $inter->sexo }}&nbsp&nbsp&nbsp&nbsp&nbsp <strong>Leito:</strong>
                                                {{ $inter->leito }}</p>
                                            <p class="card-text m-0"><strong>Data da Internação:</strong>
                                                {{ $inter->dt_internacao }}</p>

                                            @if ($inter->status == 1)
                                                <div class="text-center p-1 align-middle">
                                                    <form action="{{ route('internacoes.destroy', $inter->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('dados_internacoes.show', $inter->id) }}"
                                                            class="btn btn-primary btn-sm">@lang('Ver')
                                                        </a>

                                                        <a href="internacoes/2/{{$inter->id}}"
                                                            class="btn btn-secondary btn-sm">@lang('Alta')
                                                        </a>
                                                        <a href="internacoes/3/{{$inter->id}}"
                                                            class="btn btn-danger btn-sm">@lang('Óbito')
                                                        </a>
                                                    
                                                        @if (Auth::user()->name == 'admin')
                                                            <button class="btn btn-dark btn-sm"
                                                                type="submit">Delete</button>
                                                        @endif
                                                    </form>
                                                </div>
                                            @else
                                            @endif

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

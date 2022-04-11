@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <span>@lang('Resultado / Relatório')</span>
                            <a href="{{ url('resultados') }}" class="btn btn-primary">
                                <i class="fa fa-arrow-left"></i> @lang('Voltar')
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(!empty($success))
                            <div class="alert alert-info" role="alert">
                                {{ $success }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-4">
                                <canvas id="myChart" height="10"></canvas>
                            </div>
                            <div class="col-4">
                                <canvas id="myChart"></canvas>
                            </div>
                            <div class="col-4">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! $label !!},
                datasets: [{
                    data: {{ $data }},
                    backgroundColor: [
                        'rgba(255,0,0,0.2)',
                        'rgba(0,255,0,0.2)',
                        'rgba(0,0,255,0.2)',
                        'rgba(255,255,0,0.2)',
                        'rgba(0,255,255,0.2)',
                        'rgba(255,0,255,0.2)',
                        'rgba(192,192,192,0.2)',
                        'rgba(128,0,0,0.2)',
                        'rgba(128,128,0,0.2)',
                        'rgba(0,128,0,0.2)',
                        'rgba(0,128,128,0.2)',
                        'rgba(0,0,128,0.2)',
                    ],
                    borderColor: [
                        'rgba(255,0,0,1)',
                        'rgba(0,255,0,1)',
                        'rgba(0,0,255,1)',
                        'rgba(255,255,0,1)',
                        'rgba(0,255,255,1)',
                        'rgba(255,0,255,1)',
                        'rgba(192,192,192,1)',
                        'rgba(128,0,0,1)',
                        'rgba(128,128,0,1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,128,128,1)',
                        'rgba(0,0,128,1)',
                    ],
                    borderWidth: 1,
                    hoverOffset: 4
                }]
            },
            options: {
                layout: {
                    padding: 10,
                },
                plugins: {
                    title: {
                        display: true,
                        text: '{{ $title }}',
                        font: {
                            size: 16
                        }
                    },
                    legend: {
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    },
                }
            }
        });
    </script>
@endpush

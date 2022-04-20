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
                        @if (!empty($success))
                            <div class="alert alert-info" role="alert">
                                {{ $success }}
                            </div>
                        @endif
                        <div class="row d-flex justify-content-center">
                            <div class="col-4">
                                <canvas id="myChart" width="100" height="100"></canvas>
                            </div>
                            <div class="col-6">
                                <canvas id="myChart2" width="100" height="70"></canvas>
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
                    backgroundColor: {!! $cores !!},
                    borderColor: {!! $coresb !!},
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

        const ctx2 = document.getElementById('myChart2').getContext('2d');
        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: {!! $label2 !!},
                datasets: [{
                        label: 'Infecções',
                        data: {{ $data2 }},
                        backgroundColor: {!! $coresb !!},
                        borderColor: {!! $coresb !!},
                        borderWidth: 1,
                        hoverOffset: 4,
                        barPercentage: 0.5,
                        barThickness: 80,
                        minBarLength: 5,
                    },
                    {
                        label: 'Total de Dias',
                        data: {{ $data3 }},
                        backgroundColor: {!! $cores !!},
                        borderColor: {!! $coresb !!},
                        borderWidth: 1,
                        hoverOffset: 4
                    },
                ]
            },
            options: {
                layout: {
                    padding: 10,
                },
                plugins: {
                    title: {
                        display: true,
                        text: '{{ $title2 }}',
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
                },
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                    },
                },
                interaction: {
                    mode: 'index',
                },
            }
        });
    </script>
@endpush

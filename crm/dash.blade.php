@extends('layouts.admin')

@section('content')
    <div class="container p-5">
        <div class="row mb-4">
            <div class="col-sm-4">
                <div class="card widget-flat bg-light-subtle border border-success">
                    <div class="card-body">
                        <div class="float-end fs-5">
                            <h1> <i class="bi bi-coin text-success"></i> </h1>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Sales Amount</h5>
                        <h2 class="mt-3 mb-3 text-success">${{ number_format($sales, 2) }}</h2>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">From Jan. 1st, {{ date('Y') }} to {{ date('F j, Y') }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card widget-flat bg-light-subtle border border-warning">
                    <div class="card-body">
                        <div class="float-end fs-5">
                            <h1><i class="bi bi-rocket-takeoff text-warning"></i></h1>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Product Views</h5>
                        <h2 class="mt-3 mb-3 text-warning">{{ number_format($total_views) }}</h2>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">From Jan. 1st, {{ date('Y') }} to {{ date('F j, Y') }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card widget-flat bg-light-subtle border border-primary">
                    <div class="card-body">
                        <div class="float-end fs-5">
                            <h1><i class="bi bi-shop text-primary"></i></h1>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Quantity Sold</h5>
                        <h2 class="mt-3 mb-3 text-primary">{{ number_format($quantity) }}</h2>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">From Jan. 1st, {{ date('Y') }} to {{ date('F j, Y') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-5">
                <h1 class="fw-light">Top viewed categories</h1>
                <div> <canvas id="categoryChart"></canvas></div>
            </div>            
            <div class="col-md-6 mb-5">
                <h1 class="fw-light">Sales by category</h1>
                <div><canvas id="catsales"></canvas></div>
            </div>
            <h1 class="fw-light text-info">Top viewed enclosures</h1>
            <div class="col-md-12 mb-5 bg-light-subtle border border-info-subtle rounded">
                <canvas id="lineChart"></canvas>
            </div>            
            <div class="col-md-12 mb-5">
                <h1 class="fw-light">Top SKUs sold by Qty.</h1>
                <div> <canvas id="chart1"></canvas></div>
            </div>
            <div class="col-md-12 mb-5">
                <h1 class="fw-light">Sales by customer</h1>
                <div><canvas id="chart2"></canvas></div>
            </div>            

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                var ctx = document.getElementById('chart1').getContext('2d');
                var chart1 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($productNames) !!},
                        datasets: [{
                            label: 'Quantity Sold',
                            data: {!! json_encode($productQuantities) !!},
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)', // Red
                                'rgba(54, 162, 235, 1)', // Blue
                                'rgba(255, 206, 86, 1)', // Yellow
                                'rgba(75, 192, 192, 1)', // Green
                                'rgba(153, 102, 255, 1)', // Purple
                                'rgba(255, 159, 64, 1)', // Orange
                                'rgba(255, 0, 255, 1)', // Magenta
                                'rgba(0, 255, 255, 1)', // Cyan
                                'rgba(128, 128, 128, 1)', // Gray
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)', // Red
                                'rgba(54, 162, 235, 1)', // Blue
                                'rgba(255, 206, 86, 1)', // Yellow
                                'rgba(75, 192, 192, 1)', // Green
                                'rgba(153, 102, 255, 1)', // Purple
                                'rgba(255, 159, 64, 1)', // Orange
                                'rgba(255, 0, 255, 1)', // Magenta
                                'rgba(0, 255, 255, 1)', // Cyan
                                'rgba(128, 128, 128, 1)', // Gray
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        animations: {
                            radius: {
                                duration: 400,
                                easing: 'linear',
                                loop: (context) => context.active
                            }
                        },
                        hoverRadius: 12,
                        hoverBackgroundColor: 'black',
                        hoverBorderColor: 'black',
                        interaction: {
                            mode: 'nearest',
                            intersect: false,
                            axis: 'x'
                        },                        
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Quantity'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Product SKU'
                                }
                            }
                        }
                    }
                });

                var ctx2 = document.getElementById('chart2').getContext('2d');
                var chart2 = new Chart(ctx2, {
                    type: 'pie',
                    data: {
                        labels: {!! json_encode(array_keys($customer)) !!}, // Extract customer names as labels
                        datasets: [{
                            label: 'Customer Sales',
                            data: {!! json_encode(array_values($customer)) !!}, // Extract total amounts as data
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)', // Red
                                'rgba(54, 162, 235, 1)', // Blue
                                'rgba(255, 206, 86, 1)', // Yellow
                                'rgba(75, 192, 192, 1)', // Green
                                'rgba(153, 102, 255, 1)', // Purple
                                'rgba(255, 159, 64, 1)', // Orange
                                'rgba(255, 0, 255, 1)', // Magenta
                                'rgba(0, 255, 255, 1)', // Cyan
                                'rgba(128, 128, 128, 1)', // Gray
                            ],
                            borderColor: [
                                'rgba(255, 255, 255, 255)',

                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        animations: {
                            radius: {
                                duration: 400,
                                easing: 'linear',
                                loop: (context) => context.active
                            }
                        },
                        hoverRadius: 20,
                        hoverBackgroundColor: 'black',
                        hoverBorderColor: 'black',
                        interaction: {
                            mode: 'nearest',
                            intersect: false,
                            axis: 'x'
                        },                        
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });



                var ctx3 = document.getElementById('lineChart').getContext('2d');


                var skus = {!! json_encode($skus) !!};
                var views = {!! json_encode($views) !!};


                var lineChart = new Chart(ctx3, {
                    type: 'line',
                    data: {
                        labels: skus,
                        datasets: [{
                            label: 'SKU Views',
                            data: views,
                            borderColor: '#9eeaf9',
                            borderWidth: 2,
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            xAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'SKU'
                                }
                            }],
                            yAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Views'
                                }
                            }]
                        }
                    }
                });


                var labels = {!! json_encode(array_keys($categoryCounts)) !!};
                var data = {!! json_encode(array_values($categoryCounts)) !!};

                var ctx4 = document.getElementById('categoryChart').getContext('2d');
                var myChart = new Chart(ctx4, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Category Views',
                            data: data,
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.6)', // Blue
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)', // Blue
 
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        animations: {
                            radius: {
                                duration: 400,
                                easing: 'linear',
                                loop: (context) => context.active
                            }
                        },
                        hoverRadius: 12,
                        hoverBackgroundColor: 'black',
                        hoverBorderColor: 'black',
                        interaction: {
                            mode: 'nearest',
                            intersect: false,
                            axis: 'x'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                }); 

                
                var labels2 = {!! json_encode(array_keys($categories)) !!};
                var data2 = {!! json_encode(array_values($categories)) !!};

                var ctx5 = document.getElementById('catsales').getContext('2d');
                var myChart = new Chart(ctx5, {
                    type: 'bar',
                    data: {
                        labels: labels2,
                        datasets: [{
                            label: 'Category Revenue $',
                            data: data2,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.6)', // Green
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)', // Green
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        animations: {
                            radius: {
                                duration: 400,
                                easing: 'linear',
                                loop: (context) => context.active
                            }
                        },
                        hoverRadius: 12,
                        hoverBackgroundColor: 'black',
                        hoverBorderColor: 'black',
                        interaction: {
                            mode: 'nearest',
                            intersect: false,
                            axis: 'x'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });                  
            </script>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
@endsection

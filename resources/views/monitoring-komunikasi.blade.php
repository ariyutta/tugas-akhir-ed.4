@extends('layouts.main')

@section('panel')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Delay</h5>
                    <div id="delayChart"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Packet Loss</h5>
                    <div id="packetLossChart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Plotly.js -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script>
        // Line chart for Delay
        var delayData = {
            x: ['2024-11-10', '2024-11-11', '2024-11-12', '2024-11-13', '2024-11-14'],
            y: [5, 10, 6, 8, 7],
            type: 'scatter',
            mode: 'lines+markers',
            marker: {
                color: 'blue'
            }
        };

        var delayLayout = {
            title: 'Delay over Time',
            xaxis: {
                title: 'Date'
            },
            yaxis: {
                title: 'Delay (ms)'
            }
        };

        Plotly.newPlot('delayChart', [delayData], delayLayout);

        // Bar chart for Packet Loss
        var packetLossData = {
            x: ['2024-11-10', '2024-11-11', '2024-11-12', '2024-11-13', '2024-11-14'],
            y: [2, 3, 1, 4, 2],
            type: 'bar',
            marker: {
                color: 'red'
            }
        };

        var packetLossLayout = {
            title: 'Packet Loss over Time',
            xaxis: {
                title: 'Date'
            },
            yaxis: {
                title: 'Packet Loss (%)'
            }
        };

        Plotly.newPlot('packetLossChart', [packetLossData], packetLossLayout);
    </script>
@endsection

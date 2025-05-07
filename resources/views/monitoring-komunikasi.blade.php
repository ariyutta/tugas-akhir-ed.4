@extends('layouts.main')

@section('panel')
    <div class="pagetitle">
        <h1 style="margin-bottom: 30px;">{{ $title }}</h1>
        <form method="GET" action="{{ route('monitoring-komunikasi') }}" class="mb-4">
            <label for="tanggal">Filter Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ request('tanggal', $tanggal) }}">
            <button type="submit" class="btn btn-primary btn-sm">Tampilkan</button>
        </form>

        <div class="alert alert-info" role="alert">
            Menampilkan data untuk tanggal: <strong>{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}</strong>
        </div>
    </div>
@endsection

@section('content')
<div class="alert alert-success" role="alert">
        <strong>Delay Rata-rata per Hari:</strong> {{ $averageDelay }} ms
    </div>

    <div class="alert alert-success" role="alert">
        <strong>Packet Loss per Hari:</strong> {{ $packetLossPercentage }} %
    </div>

    <!-- Grafik Delay -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title">Grafik Delay</h5>
                    <canvas id="delayChart" style="height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Packet Loss -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title">Grafik Packet Loss</h5>
                    <canvas id="packetLossChart" style="height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Gabungan Delay dan Packet Loss -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title">Tabel Delay dan Packet Loss</h5>
                    <table class="table table-bordered" id="datatable1">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Waktu Kirim</th>
                                <th class="text-center">Waktu Diterima</th>
                                <!-- <th class="text-center">Topik</th> -->
                                <th class="text-center">Delay (ms)</th>
                                <th class="text-center">Data Hilang</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $row)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->sent_at ?? 'N/A' }}</td>
        <td>{{ $row->received_at ?? 'N/A' }}</td>
        <!-- <td>{{ $row->topic }}</td> -->
        <td>{{ $row->delay ?? 'N/A' }}</td>
        <td>{{ $row->lost_packets == 0 ? 'Tidak Ada' : 'Ada' }}</td>
    </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    $(document).ready(function () {
        $('#datatable1').DataTable({
            "searching": false // Menonaktifkan pencarian
        });

        // Grafik Delay
        var ctxDelay = document.getElementById('delayChart').getContext('2d');
        var delayChart = new Chart(ctxDelay, {
            type: 'line',
            data: {
                labels: @json($labels), // Data waktu
                datasets: [{
                    label: 'Delay (ms)',
                    data: @json($delayData), // Data delay
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Waktu'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Delay (ms)'
                        },
                        beginAtZero: true
                    }
                }
            }
        });

        // Grafik Packet Loss
        var ctxPacketLoss = document.getElementById('packetLossChart').getContext('2d');
        var packetLossChart = new Chart(ctxPacketLoss, {
            type: 'line',
            data: {
                labels: @json($labels), // Data waktu
                datasets: [{
                    label: 'Packet Loss (%)',
                    data: @json($packetLossData), // Data packet loss
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Waktu'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Packet Loss'
                        },
                        beginAtZero: false,  // Jangan mulai dari 0 untuk sumbu Y
                        min: -0.05, // Set sumbu Y mulai dari 0.05 untuk menampilkan garis
                        max: 1   // Batas maksimum untuk 100% (packet loss)
                    }
                }
            }
        });
    });
</script>

@endpush

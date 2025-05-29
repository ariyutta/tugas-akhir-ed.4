@extends('layouts.main')

@section('panel')
    <div class="pagetitle">
        <h1 style="margin-bottom: 30px;">{{ $title }}</h1>
        <form method="GET" action="{{ route('tabel-monitoring') }}" class="mb-4">
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
    <div id="tabel-monitoring-container">
        @include('partials.tabel-monitoring-data')
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        let table1, table2;

        $(document).ready(function () {
            table1 = $('#datatable1').DataTable();
            table2 = $('#datatable2').DataTable();

            $('#refresh-btn').on('click', function () {
                refreshTables();
            });
        });

        function refreshTables() {
            let page1 = table1.page();
            let search1 = table1.search();

            let page2 = table2.page();
            let search2 = table2.search();

            table1.destroy();
            table2.destroy();

            $('#tabel-monitoring-container').load('/ajax/tabel-monitoring', function () {
                table1 = $('#datatable1').DataTable();
                table2 = $('#datatable2').DataTable();

                table1.search(search1).page(page1).draw('page');
                table2.search(search2).page(page2).draw('page');
            });
        }
    </script>
@endpush

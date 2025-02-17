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
        <div class="col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mt-3">Slave 1</h3>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Waktu</th>
                                        <th class="text-center">Value</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slave1 as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->waktu }}</td>
                                            <td class="text-center">{{ $item->value }}</td>
                                            <td class="text-center">{{ $item->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mt-3">Slave 2</h3>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Waktu</th>
                                        <th class="text-center">Value</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slave2 as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->waktu }}</td>
                                            <td class="text-center">{{ $item->value }}</td>
                                            <td class="text-center">{{ $item->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

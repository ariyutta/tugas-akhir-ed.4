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
        <h2 class="text-center">Slave Node 1</h2>
        <hr>
        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Intensitas Cahaya</h5>
                    <div class="d-flex justify-content-between">
                        <i class="bi bi-brightness-high" style="font-size:70px"></i>
                        <h1 class="mt-4" style="font-size: 50px">{{ $slave1->value }}</h1>
                    </div>
                    <div style="border: 1px solid rgb(192, 192, 192); border-radius:10px" class="px-2 py-1">
                        <span>{{ Carbon\Carbon::parse($slave1->waktu)->format('s') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Status Lampu 1</h5>
                    <div class="d-flex justify-content-between">
                        <i class="bi bi-lamp-fill" style="font-size:70px"></i>
                        <h1 class="mt-4" style="font-size: 50px">{{ $slave1->status == 'hidup' ? 'ON' : 'OFF' }}</h1>
                    </div>
                    <div style="border: 1px solid rgb(192, 192, 192); border-radius:10px" class="px-2 py-1">
                        <span>{{ Carbon\Carbon::parse($slave1->waktu)->format('s') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Status Lampu 2</h5>
                    <div class="d-flex justify-content-between">
                        <i class="bi bi-lamp-fill" style="font-size:70px"></i>
                        <h1 class="mt-4" style="font-size: 50px">{{ $slave1->status == 'hidup' ? 'ON' : 'OFF' }}</h1>
                    </div>
                    <div style="border: 1px solid rgb(192, 192, 192); border-radius:10px" class="px-2 py-1">
                        <span>{{ Carbon\Carbon::parse($slave1->waktu)->format('s') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <h2 class="text-center">Slave Node 2</h2>
        <hr>
        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Intensitas Cahaya</h5>
                    <div class="d-flex justify-content-between">
                        <i class="bi bi-brightness-high" style="font-size:70px"></i>
                        <h1 class="mt-4" style="font-size: 50px">{{ $slave2->value }}</h1>
                    </div>
                    <div style="border: 1px solid rgb(192, 192, 192); border-radius:10px" class="px-2 py-1">
                        <span>{{ Carbon\Carbon::parse($slave2->waktu)->format('s') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Status Lampu 3</h5>
                    <div class="d-flex justify-content-between">
                        <i class="bi bi-lamp-fill" style="font-size:70px"></i>
                        <h1 class="mt-4" style="font-size: 50px">{{ $slave2->status == 'hidup' ? 'ON' : 'OFF' }}</h1>
                    </div>
                    <div style="border: 1px solid rgb(192, 192, 192); border-radius:10px" class="px-2 py-1">
                        <span>{{ Carbon\Carbon::parse($slave2->waktu)->format('s') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Status Lampu 4</h5>
                    <div class="d-flex justify-content-between">
                        <i class="bi bi-lamp-fill" style="font-size:70px"></i>
                        <h1 class="mt-4" style="font-size: 50px">{{ $slave2->status == 'hidup' ? 'ON' : 'OFF' }}</h1>
                    </div>
                    <div style="border: 1px solid rgb(192, 192, 192); border-radius:10px" class="px-2 py-1">
                        <span>{{ Carbon\Carbon::parse($slave2->waktu)->format('s') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

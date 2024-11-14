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

<?php

$data = [];

for ($i = 1; $i <= 15; $i++) {
    $row = [
        'No' => $i,
        'Waktu' => date('Y-m-d H:i', strtotime('2024-11-14 10:00 +' . $i * 5 . ' minutes')),
        'IC_1' => rand(50, 700),
        'Lampu_1' => rand(0, 1) ? 'Hidup' : 'Mati',
        'IC_2' => rand(50, 700),
        'Lampu_2' => rand(0, 1) ? 'Hidup' : 'Mati',
        'IC_3' => rand(50, 700),
        'Lampu_3' => rand(0, 1) ? 'Hidup' : 'Mati',
    ];
    $data[] = $row;
}

?>

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Waktu</th>
                                <th>IC 1</th>
                                <th>Lampu</th>
                                <th>IC 2</th>
                                <th>Lampu</th>
                                <th>IC 3</th>
                                <th>Lampu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $row['No'] ?></td>
                                <td><?= $row['Waktu'] ?></td>
                                <td><?= $row['IC_1'] ?></td>
                                <td><?= $row['Lampu_1'] ?></td>
                                <td><?= $row['IC_2'] ?></td>
                                <td><?= $row['Lampu_2'] ?></td>
                                <td><?= $row['IC_3'] ?></td>
                                <td><?= $row['Lampu_3'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

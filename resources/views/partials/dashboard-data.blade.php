
<div class="row">
    <!-- Wadah besar -->
    <div class="card shadow w-100">
        <div class="card-body">
            <h2 class="card-title text-center" style="font-size:40px">Kebun 1</h2>
            <span class="text-center" style="font-size: 10px">Slave Node 1</span>
            <hr>

            <div class="row">
                <!-- Kotak Intensitas Cahaya -->
                <div class="col-sm-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Intensitas Cahaya</h5>
                            <div class="d-flex justify-content-between">
                                <i class="bi bi-brightness-high" style="font-size:70px"></i>
                                <h1 class="mt-4" style="font-size: 50px">{{ $slave1->value }}</h1>
                            </div>
                            <!-- <div style="border: 1px solid rgb(192, 192, 192); border-radius:10px" class="px-2 py-1">
                                <span>Delay : {{ $slave1->delay }} detik</span>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Kotak Status Lampu 1 -->
                <div class="col-sm-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Status Lampu 1</h5>
                            <div class="d-flex justify-content-between">
                                <i class="bi bi-lamp-fill" style="font-size:70px"></i>
                                <h1 class="mt-4" style="font-size: 50px">{{ $slave1->status }}</h1>
                            </div>
                            <!-- <div style="border: 1px solid rgb(192, 192, 192); border-radius:10px" class="px-2 py-1">
                                <span>Delay : {{ $slave1->delay }} detik</span>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Kotak Status Lampu 2 -->
                <div class="col-sm-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Status Lampu 2</h5>
                            <div class="d-flex justify-content-between">
                                <i class="bi bi-lamp-fill" style="font-size:70px"></i>
                                <h1 class="mt-4" style="font-size: 50px">{{ $slave1->status }}</h1>
                            </div>
                            <!-- <div style="border: 1px solid rgb(192, 192, 192); border-radius:10px" class="px-2 py-1">
                                <span>Delay : {{ $slave1->delay }} detik</span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Wadah besar -->
    <div class="card shadow w-100">
        <div class="card-body">
            <h2 class="card-title text-center" style="font-size:40px">Kebun 2</h2>
            <span class="text-center" style="font-size: 10px">Slave Node 2</span>
            <hr>

            <div class="row">
                <!-- Kotak Intensitas Cahaya -->
                <div class="col-sm-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Intensitas Cahaya</h5>
                            <div class="d-flex justify-content-between">
                                <i class="bi bi-brightness-high" style="font-size:70px"></i>
                                <h1 class="mt-4" style="font-size: 50px">{{ $slave2->value }}</h1>
                            </div>
                            <!-- <div style="border: 1px solid rgb(192, 192, 192); border-radius:10px" class="px-2 py-1">
                                <span>Delay : {{ $slave2->delay }} detik</span>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Kotak Status Lampu 3 -->
                <div class="col-sm-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Status Lampu 3</h5>
                            <div class="d-flex justify-content-between">
                                <i class="bi bi-lamp-fill" style="font-size:70px"></i>
                                <h1 class="mt-4" style="font-size: 50px">{{ $slave2->status }}</h1>
                            </div>
                            <!-- <div style="border: 1px solid rgb(192, 192, 192); border-radius:10px" class="px-2 py-1">
                                <span>Delay : {{ $slave2->delay }} detik</span>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Kotak Status Lampu 4 -->
                <div class="col-sm-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Status Lampu 4</h5>
                            <div class="d-flex justify-content-between">
                                <i class="bi bi-lamp-fill" style="font-size:70px"></i>
                                <h1 class="mt-4" style="font-size: 50px">{{ $slave2->status }}</h1>
                            </div>
                            <!-- <div style="border: 1px solid rgb(192, 192, 192); border-radius:10px" class="px-2 py-1">
                                <span>Delay : {{ $slave2->delay }} detik</span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

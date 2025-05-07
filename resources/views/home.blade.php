@extends('layouts.main')

@section('panel')
    <div class="pagetitle">
        <h1 style="margin-bottom: 30px;">{{ $title }}</h1>
        <nav>
            <!-- <ol class="breadcrumb">
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol> -->
        </nav>
    </div>
@endsection

@section('content')
    <div id="dashboard-container">
        @include('partials.dashboard-data')
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    setInterval(function () {
        $('#dashboard-container').load('/ajax/dashboard');
    }, 5000);
</script>
@endpush

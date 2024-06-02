@extends('dashboard.layout.main')

@section('content')
    <h1 class="text-xl mb-3">Dashboard SewMob</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <canvas id="novelChart" width="400" height="200"></canvas>
    </div>
@endsection
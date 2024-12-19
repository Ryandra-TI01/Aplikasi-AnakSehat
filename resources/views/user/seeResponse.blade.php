@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @foreach($consultation as $k)
    <div>
        <h3>Keluhan Anda:</h3>
        <p>{{ $k->pesan }}</p>
        <h3>Respon Dokter:</h3>
        <p>{{ $k->response->respon }}</p>
        <small>Dokter: {{ $k->response->doctor->nama }}</small>
    </div>
@endforeach

{{-- tahap percobaan --}}
</div>
@endsection
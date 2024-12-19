@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <form method="POST" action="{{ route('konsultasi.kirim') }}">
    @csrf
    <div>
        <label>Pilih Anak:</label>
        <select name="child_id" required>
            @foreach($children as $child)
                <option value="{{ $child->id }}">{{ $child->nama }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Keluhan Anda:</label>
        <textarea name="pesan" rows="4" required></textarea>
    </div>
    <button type="submit">Kirim Konsultasi</button>
</form>
{{-- tahap percobaan --}}
</div>
@endsection
@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <form method="POST" action="/child/{{ $child->id }}">
    @csrf
    <div>
        <label>Bulan ke:</label>
        <input type="number" name="bulan" min="1" max="60" required>
    </div>
    <div>
        <label>Tinggi Badan (cm):</label>
        <input type="number" step="0.1" name="tinggi" required>
    </div>
    <div>
        <label>Berat Badan (kg):</label>
        <input type="number" step="0.1" name="berat" required>
    </div>
    <button type="submit">Simpan</button>
</form>
<table>
  <thead>
      <tr>
          <th>Bulan</th>
          <th>Tinggi Badan (cm)</th>
          <th>Berat Badan (kg)</th>
          <th>Status Gizi</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($child->childHealtData as $record)
      <tr>
          <td>{{ $record->bulan }}</td>
          <td>{{ $record->tinggi }}</td>
          <td>{{ $record->berat }}</td>
          <td>{{ $record->status_gizi }}</td>
      </tr>
      @endforeach
  </tbody>
</table>
{{-- tahap percobaan --}}

</div>
@endsection
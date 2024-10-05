@extends('layouts.app')

@section('content')
    <h1>Edit Spesifikasi Mobil</h1>

    <form action="{{ route('speks.update', $spek->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="mobil_id">Mobil:</label>
            <select name="mobil_id" id="mobil_id" required>
                <option value="">Pilih Mobil</option>
                @foreach($mobils as $mobil)
                    <option value="{{ $mobil->id }}" {{ $spek->mobil_id == $mobil->id ? 'selected' : '' }}>
                        {{ $mobil->nama_mobil }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="mesin_cc">Mesin CC:</label>
            <input type="number" name="mesin_cc" id="mesin_cc" value="{{ $spek->mesin_cc }}" required>
        </div>

        <div>
            <label for="transmisi">Transmisi:</label>
            <input type="text" name="transmisi" id="transmisi" value="{{ $spek->transmisi }}" required>
        </div>

       

        <button type="submit">Update Spek</button>
    </form>

    <a href="{{ route('speks.index') }}">Kembali ke Daftar Spesifikasi</a>
@endsection

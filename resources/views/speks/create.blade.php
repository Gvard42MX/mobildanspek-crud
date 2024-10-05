@extends('layouts.app')

@section('content')
    <h1>Tambah Spesifikasi</h1>

    <form action="{{ route('speks.store') }}" method="POST">
        @csrf
        <div>
            <label for="mobil_id">Mobil:</label>
            <select name="mobil_id" id="mobil_id" required>
                <option value="">Pilih Mobil</option>
                @foreach($mobils as $mobil)
                    <option value="{{ $mobil->id }}">{{ $mobil->nama_mobil }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="mesin_cc">Mesin CC:</label>
            <input type="number" name="mesin_cc" id="mesin_cc" required>
        </div>
        <div>
            <label for="transmisi">Transmisi:</label>
            <input type="text" name="transmisi" id="transmisi" required>
        </div>

        <button type="submit">Simpan</button>
    </form>
@endsection

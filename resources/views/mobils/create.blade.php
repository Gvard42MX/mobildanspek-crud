@extends('layouts.app')

@section('content')
    <h1>Tambah Mobil</h1>

    <form action="{{ route('mobils.store') }}" method="POST">
        @csrf
        <div>
            <label for="nama_mobil">Nama Mobil:</label>
            <input type="text" name="nama_mobil" id="nama_mobil" required>
        </div>
        <div>
            <label for="merk">Merk:</label>
            <input type="text" name="merk" id="merk" required>
        </div>
        <div>
            <label for="tahun">Tahun:</label>
            <input type="number" name="tahun" id="tahun" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection

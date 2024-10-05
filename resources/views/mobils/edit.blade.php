@extends('layouts.app')

@section('content')
    <h1>Edit Mobil</h1>

    <form action="{{ route('mobils.update', $mobil->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_mobil">Nama Mobil:</label>
            <input type="text" name="nama_mobil" id="nama_mobil" value="{{ $mobil->nama_mobil }}" required>
        </div>

        <div>
            <label for="merk">Merk:</label>
            <input type="text" name="merk" id="merk" value="{{ $mobil->merk }}" required>
        </div>

        <div>
            <label for="tahun">Tahun:</label>
            <input type="number" name="tahun" id="tahun" value="{{ $mobil->tahun }}" required>
        </div>

        <button type="submit">Update Mobil</button>
    </form>

    <a href="{{ route('mobils.index') }}">Kembali ke Daftar Mobil</a>
@endsection

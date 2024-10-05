@extends('layouts.app')

@section('content')
    <h1>Daftar Mobil</h1>
    <a href="{{ route('mobils.create') }}">Tambah Mobil</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mobil</th>
                <th>Merk</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mobils as $mobil)
                <tr>
                    <td>{{ $mobil->id }}</td>
                    <td>{{ $mobil->nama_mobil }}</td>
                    <td>{{ $mobil->merk }}</td>
                    <td>{{ $mobil->tahun }}</td>
                    <td>
                       
                        <a href="{{ route('mobils.edit', $mobil->id) }}">Edit</a>
                        <form action="{{ route('mobils.destroy', $mobil->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

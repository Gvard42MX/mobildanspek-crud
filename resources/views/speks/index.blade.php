
@extends('layouts.app')

@section('content')
    <h1>Daftar Spesifikasi</h1>
    <a href="{{ route('speks.create') }}">Tambah Spesifikasi</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mobil</th>
                <th>Mesin CC</th>
                <th>Transmisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($speks as $spek)
                <tr>
                    <td>{{ $spek->id }}</td>
                    <td>{{ $spek->mobil->nama_mobil }}</td>
                    <td>{{ $spek->mesin_cc }}</td>
                    <td>{{ $spek->transmisi }}</td>
                   
                    <td>
                       
                        <a href="{{ route('speks.edit', $spek->id) }}">Edit</a>
                        <form action="{{ route('speks.destroy', $spek->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
<a href="{{ route('mobils.index') }}" class="btn btn-info">kembali ke mobil</a>

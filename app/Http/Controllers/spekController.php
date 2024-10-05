<?php

// app/Http/Controllers/SpekController.php
namespace App\Http\Controllers;

use App\Models\Spek;
use App\Models\Mobil; // Menggunakan model Mobil
use Illuminate\Http\Request;

class SpekController extends Controller
{
    public function index()
    {
        $speks = Spek::with('mobil')->get(); // Ambil semua spesifikasi beserta mobilnya
        return view('speks.index', compact('speks'));
    }

    public function create()
    {
        $mobils = Mobil::all(); // Ambil semua mobil untuk dropdown
        return view('speks.create', compact('mobils'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mobil_id' => 'required|exists:mobils,id', // Validasi ID mobil
            'mesin_cc' => 'required|numeric',
            'transmisi' => 'required|string|max:255',
            
        ]);

        Spek::create($request->all()); // Simpan data spek

        return redirect()->route('speks.index')->with('success', 'Spek created successfully.');
    }

    public function show($id)
    {
        $spek = Spek::with('mobil')->findOrFail($id); // Ambil spek berdasarkan ID
        return view('speks.show', compact('spek')); // Kirim data ke view
    }

    public function edit($id)
    {
        $spek = Spek::findOrFail($id); // Ambil spek berdasarkan ID
        $mobils = Mobil::all(); // Ambil semua mobil untuk dropdown
        return view('speks.edit', compact('spek', 'mobils'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mobil_id' => 'required|exists:mobils,id', // Validasi ID mobil
            'mesin_cc' => 'required|numeric',
            'transmisi' => 'required|string|max:255',
            
        ]);

        $spek = Spek::findOrFail($id); // Ambil spek berdasarkan ID
        $spek->update($request->all()); // Update data spek

        return redirect()->route('speks.index')->with('success', 'Spek updated successfully.');
    }

    public function destroy($id)
    {
        $spek = Spek::findOrFail($id); // Ambil spek berdasarkan ID
        $spek->delete(); // Hapus spek

        return redirect()->route('speks.index')->with('success', 'Spek deleted successfully.');
    }
}

?>

<?php
// app/Http/Controllers/MobilController.php
namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::all(); // Ambil semua mobil
        return view('mobils.index', compact('mobils'));
    }

    public function create()
    {
        return view('mobils.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mobil' => 'required|max:255',
            'merk' => 'required|max:255',
            'tahun' => 'required|numeric',
        ]);

        Mobil::create($request->all());

        return redirect()->route('mobils.index')->with('success', 'Mobil created successfully.');
    }

    public function show($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('mobils.show', compact('mobil'));
    }

    public function edit($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('mobils.edit', compact('mobil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mobil' => 'required|max:255',
            'merk' => 'required|max:255',
            'tahun' => 'required|numeric',
        ]);

        $mobil = Mobil::findOrFail($id);
        $mobil->update($request->all());

        return redirect()->route('mobils.index')->with('success', 'Mobil updated successfully.');
    }

    public function destroy($id)
    {
        $mobil = Mobil::findOrFail($id);
        $mobil->delete();

        return redirect()->route('mobils.index')->with('success', 'Mobil deleted successfully.');
    }
}

?>

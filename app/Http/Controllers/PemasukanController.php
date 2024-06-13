<?php

namespace App\Http\Controllers;

use App\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function pemasukan()
    {
        $pemasukan = Pemasukan::orderBy('id', 'desc')->get();
        return view('pemasukan', ["key" => "pemasukan", 'pm' => $pemasukan]);
    }
    public function index()
    {
        $pemasukan = Pemasukan::all();
        return view('pemasukan.index', compact('pemasukan'));
    }

    public function create()
    {
        return view('pemasukan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
        ]);

        Pemasukan::create($request->all());

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil ditambahkan.');
    }

    public function show(Pemasukan $pemasukan)
    {
        return view('pemasukan.show', compact('pemasukan'));
    }

    public function edit(Pemasukan $pemasukan)
    {
        return view('pemasukan.edit', compact('pemasukan'));
    }

    public function update(Request $request, Pemasukan $pemasukan)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
        ]);

        $pemasukan->update($request->all());

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil diperbarui.');
    }

    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgresProyek;

class ProgresProyekController extends Controller
{
    public function index()
    {
        $progres = ProgresProyek::all();
        return view('pproyek', compact('progres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'persentase' => 'required|integer|min:0|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // Simpan foto ke folder uploads/foto_proyek
        if ($request->hasFile('foto')) {
            $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/foto_proyek'), $fileName);
            $data['foto'] = $fileName;
        }

        ProgresProyek::create($data);

        return redirect()->route('progres.index')->with('success', 'Data proyek berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $proyek = ProgresProyek::findOrFail($id);

        // Hapus foto dari folder kalau ada
        if ($proyek->foto && file_exists(public_path('uploads/foto_proyek/' . $proyek->foto))) {
            unlink(public_path('uploads/foto_proyek/' . $proyek->foto));
        }

        $proyek->delete();

        return redirect()->route('progres.index')->with('success', 'Data proyek berhasil dihapus.');
    }
}

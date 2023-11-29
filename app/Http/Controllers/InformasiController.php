<?php

namespace App\Http\Controllers;

use App\Http\Requests\informasi\StoreRequest;
use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasis = Informasi::paginate(10);
        return view('admin.pages.informasi.index', compact('informasis'));
    }

    public function create()
    {
        return view('admin.pages.informasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('images/informasi', $namaGambar);
        $data['gambar'] = $namaGambar;
    }

    Informasi::query()->create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'gambar' => $data['gambar'] ?? null,
    ]);

    return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informasi $informasi)
{
    return view('admin.pages.informasi.edit', compact('informasi'));
}

public function update(StoreRequest $request, Informasi $informasi)
{
    // Jika ada perubahan pada gambar, hapus gambar lama dan simpan gambar baru
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('images/informasi', $namaGambar);

        // Hapus gambar lama jika ada
        if ($informasi->gambar) {
            Storage::delete('images/informasi/' . $informasi->gambar);
        }

        $informasi->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namaGambar,
        ]);
    } else {
        // Jika tidak ada perubahan pada gambar, update informasi tanpa mengubah gambar
        $informasi->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
    }

    return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil diubah');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informasi $informasi)
    {
        $informasi->delete();

        return to_route('admin.informasi.index')->with('success', 'informasi berhasil dihapus');
    }
}

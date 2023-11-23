<?php

namespace App\Http\Controllers;

use App\Http\Requests\pendataan\StoreRequest;
use App\Models\Pendataan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendataanTahunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'pendataans' => Pendataan::orderBy('created_at', 'desc')->paginate(),
        ];
        return view('admin.pages.pendataan-tahunan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.pendataan-tahunan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pendataan');
        }

        Pendataan::query()->create($data);

        return redirect()->route('admin.pendataan.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendataan $pendataan)
    {
        try {
            $foto = $pendataan->foto;
            $delete = $pendataan->delete();
            if($delete) {
                if(Storage::exists($pendataan->foto)) Storage::delete($pendataan->foto);
            }

            return redirect()->route('admin.pendataan.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return redirect()->route('admin.pendataan.index')->with('error', 'Data gagal dihapus karena terkait dengan data lain');
            }
            return redirect()->route('admin.pendataan.index')->with('error', 'Data gagal dihapus');
        }
    }
}
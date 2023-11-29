<?php

namespace App\Http\Controllers;

use App\Http\Requests\informasi\StoreRequest;
use App\Http\Requests\informasi\UpdateRequest;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = auth()->user();
        $data = [
            'informations' => Information::query()->orderBy('created_at', 'desc')->paginate(8),
            'user' => $user,
        ];
        return view('admin.pages.informasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user = auth()->user();
        return view('admin.pages.informasi.create',compact('user'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['gambar'] = $request->file('gambar')->store('informasi', 'public');

        Information::query()->create($data);

        return to_route('admin.informasi.index')->with('success', 'Informasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Information $informasi)
    {
        return view('admin.pages.informasi.detail', compact('informasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $informasi)
    {

        $user = auth()->user();
        return view('admin.pages.informasi.edit', compact('informasi', 'user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Information $informasi)
    {
        $data = $request->validated();

        if($request->hasFile('gambar')) {
            if(Storage::exists($informasi->gambar)) {
                Storage::delete($informasi->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('informasi', 'public');
        }

        $informasi->update($data);

        return to_route('admin.informasi.index')->with('success', 'Informasi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $informasi)
    {
        $data = $informasi;

        try {
            $informasi->delete();

            if (Storage::exists($data->gambar)) Storage::delete($data->gambar);

            return to_route('admin.informasi.index')->with('success', 'Informasi berhasil dihapus');
        } catch (\Exception $e) {
            return to_route('admin.informasi.index')->with('error', 'Informasi gagal dihapus');
        }
    }
}

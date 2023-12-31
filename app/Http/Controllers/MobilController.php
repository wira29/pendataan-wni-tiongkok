<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Http\Requests\mobil\StoreRequest;
use App\Http\Requests\mobil\UpdateRequest;
use Illuminate\Support\Facades\Storage;


class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $data = [
            'mobils' => Mobil::query()->orderBy('created_at', 'desc')->paginate(8),
            'user' => $user,
        ];
        return view('admin.pages.mobil.index', $data);        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('admin.pages.mobil.create',compact('user'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['gambar'] = $request->file('gambar')->store('mobil', 'public');

        Mobil::query()->create($data);

        return to_route('admin.mobil.index')->with('success', 'Informasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobil)
    {
        $user = auth()->user();
        return view('admin.pages.mobil.detail', compact('mobil','user'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        $user = auth()->user();
        return view('admin.pages.mobil.edit', compact('mobil', 'user'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Mobil $mobil)
    {
        $data = $request->validated();

        if($request->hasFile('gambar')) {
            if(Storage::exists($mobil->gambar)) {
                Storage::delete($mobil->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('mobil', 'public');
        }

        $mobil->update($data);

        return to_route('admin.mobil.index')->with('success', 'mobil berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        $data = $mobil;

        try {
            $mobil->delete();

            if (Storage::exists($data->gambar)) Storage::delete($data->gambar);

            return to_route('admin.mobil.index')->with('success', 'mobil berhasil dihapus');
        } catch (\Exception $e) {
            return to_route('admin.mobil.index')->with('error', 'mobil gagal dihapus');
        }
    }
}

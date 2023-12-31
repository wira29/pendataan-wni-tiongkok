<?php

namespace App\Http\Controllers;

use App\Http\Requests\sopir\StoreRequest;
use App\Http\Requests\sopir\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Sopir;

class SopirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $data = [
            'sopirs' => Sopir::query()->orderBy('created_at', 'desc')->paginate(8),
            'user' => $user,
        ];
        return view('admin.pages.sopir.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('admin.pages.sopir.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['gambar'] = $request->file('gambar')->store('sopir', 'public');

        Sopir::query()->create($data);

        return to_route('admin.sopir.index')->with('success', 'Informasi berhasil ditambahkan');
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
    public function edit(Sopir $sopir)
    {
        $user = auth()->user();
        return view('admin.pages.sopir.edit', compact('sopir','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Sopir $sopir)
    {
        $data = $request->validated();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('sopir', 'public');
        }

        $sopir->update($data);

        return to_route('admin.sopir.index')->with('success', 'Informasi berhasil diubah');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sopir $sopir)
    {
        try{
            $sopir = Driver::query()->findOrFail($sopir->id);
            $sopir->delete();
            return to_route('admin.sopir.index')->with('success', 'sopir berhasil dihapus');

        }catch (\Exception $exception){
            if($exception->getCode() == 23000){
                return redirect()->route('admin.sopir.index')->with('error', 'Data gagal dihapus, data digunakan pada relasi lain');
            }
            return redirect()->route('admin.sopir.index')->with('error', 'Data gagal dihapus');
        }        
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\cabang\StoreRequest;
use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $data = [
            'cabangs' => Cabang::query()->paginate(8),
            'user' => $user,
        ];
        return view('admin.pages.cabang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('admin.pages.cabang.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Cabang::query()->create($data);

        return to_route('admin.cabang.index')->with('success', 'Cabang berhasil ditambahkan');
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
    public function edit(Cabang $cabang)
    {
        $user = auth()->user();
        return view('admin.pages.cabang.edit', compact('cabang', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Cabang $cabang)
    {
        $data = $request->validated();

        $cabang->update($data);

        return to_route('admin.cabang.index')->with('success', 'Cabang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cabang $cabang)
    {
        try{
            $cabang = Cabang::query()->findOrFail($cabang->id);
            $cabang->delete();
            return to_route('admin.cabang.index')->with('success', 'Cabang berhasil dihapus');

        }catch (\Exception $exception){
            if($exception->getCode() == 23000){
                return redirect()->route('admin.cabang.index')->with('error', 'Data gagal dihapus, data digunakan pada relasi lain');
            }
            return redirect()->route('admin.cabang.index')->with('error', 'Data gagal dihapus');
        }        
    }
}

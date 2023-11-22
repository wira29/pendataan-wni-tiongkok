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
        $data = [
            'cabangs' => Cabang::query()->paginate(8),
        ];
        return view('admin.pages.cabang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.cabang.create');
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
        return view('admin.pages.cabang.edit', compact('cabang'));
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
        $cabang->delete();

        return to_route('admin.cabang.index')->with('success', 'Cabang berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ranting\StoreRequest;
use App\Models\Cabang;
use App\Models\Ranting;
use Illuminate\Http\Request;

class RantingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $data = [
            'rantings' => Ranting::query()->with('cabang')->paginate(8),
            'user' => $user,
        ];

        return view('admin.pages.ranting.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $data = [
            'cabangs' => Cabang::all(),
            'user' => $user,
        ];
        return view('admin.pages.ranting.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Ranting::create($data);

        return to_route('admin.ranting.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(Ranting $ranting)
    {
        $cabangs = Cabang::all();
        return view('admin.pages.ranting.edit', compact('ranting', 'cabangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Ranting $ranting)
    {
        $data = $request->validated();

        $ranting->update($data);

        return to_route('admin.ranting.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ranting $ranting)
    {
        $ranting->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}

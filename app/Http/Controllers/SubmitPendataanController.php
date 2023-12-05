<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SubmitPendataan;
use App\Models\Pendataan;
use App\Http\Requests\submitpendataan\StoreRequest;

class SubmitPendataanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function storePendataan(SubmitPendataanStoreRequest $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        // pendataan berdasarkan id yang diklik
        $data['pendataan_id'] = $request->pendataan_id;
        // $data['pendataan_id'] = Pendataan::query()->orderBy('created_at', 'desc')->first()->id;
        $data['user_id'] = auth()->user()->id;
        SubmitPendataan::query()->create($data);

        return redirect()->route('admin.pendataan.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
        $EvPendataan = Pendataan::query()->where('id', $id)->first();
        $pendataan = SubmitPendataan::query()->where('pendataan_id', $id)->where('user_id', $user->id)->first();

        return view('admin.pages.pendataan-tahunan.detail', compact('pendataan', 'EvPendataan', 'user'));
    }

    public function detailAdmin(User $user, string $id)
    {
        $EvPendataan = Pendataan::query()->where('id', $id)->first();
        $pendataan = SubmitPendataan::query()->where('pendataan_id', $id)->where('user_id', $user->id)->first();

        return view('admin.pages.pendataan-tahunan.detail', compact('pendataan', 'EvPendataan', 'user'));
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
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\pendataan\StoreRequest;
use App\Models\Pendataan;
use App\Models\SubmitPendataan;
use App\Http\Controllers\SubmitPendataanController as SubmitPendataans;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PendataanTahunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $submitPendataan = SubmitPendataan::query()->where('user_id', $user->id)->get();
        $data = [
            'pendataans' => Pendataan::orderBy('created_at', 'desc')->paginate(),
            'user' => $user,
            'submitPendataan' => $submitPendataan,
        ];

        return view('admin.pages.pendataan-tahunan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('admin.pages.pendataan-tahunan.create',compact('user'));
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
        $user = auth()->user();
        $pendataan = Pendataan::query()->findOrFail($id);
        return view('admin.pages.pendataan-tahunan.pendataan', compact('pendataan','user'));
    }

    public function detailAdmin(string $id)
    {

        $user = auth()->user();
        $pendataan = Pendataan::query()
                    ->with('submitPendataans.pengguna.ranting.cabang')
                    ->where('id', $id)
                    ->first();
//        dd($pendataan);
        return view('admin.pages.pendataan-tahunan.detail-admin', compact('pendataan', 'user'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pendataan = Pendataan::query()->findOrFail($id);
        $user = auth()->user();
        return view('admin.pages.pendataan-tahunan.edit', compact('id', 'user', 'pendataan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendataan = Pendataan::query()->findOrFail($id);
        $data = $request->all();

        if($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pendataan');
            if(Storage::exists($pendataan->foto)) Storage::delete($pendataan->foto);
        }

        $pendataan->update($data);

        return redirect()->route('admin.pendataan.index')->with('success', 'Data berhasil diubah');
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

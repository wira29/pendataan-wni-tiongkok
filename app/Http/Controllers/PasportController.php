<?php

namespace App\Http\Controllers;

use App\Models\PembaruanPaspor;
use App\Models\SubmitPembaruanPaspor;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\paspor\StoreRequest;
use App\Http\Requests\paspor\UpdateRequest;


use Illuminate\Http\Request;

class PasportController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $submitPembaruanPaspor = SubmitPembaruanPaspor::query()->where('user_id', $user->id)->get();
        $data = [
            'paspors' => PembaruanPaspor::query()->orderBy('created_at', 'desc')->paginate(8),
            'user' => $user,
            'submitPembaruanPaspor' => $submitPembaruanPaspor,
        ];
        return view('admin.pages.pembaruan-pasport.index', $data);
    }

    public function create()
    {
        $user = auth()->user();
        // Your create logic goes here
        return view('admin.pages.pembaruan-pasport.create',compact('user')); // Replace 'your.create.view' with the actual view name
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pendataan');
        }

        PembaruanPaspor::query()->create($data);

        return redirect()->route('admin.pembaruan-paspor.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $user = auth()->user();
        $pembaruanPaspor = PembaruanPaspor::query()->findOrFail($id);
        return view('admin.pages.pembaruan-pasport.pembaruan', compact('pembaruanPaspor','user'));
    }

    public function detailAdmin(string $id)
    {

        $user = auth()->user();
        $pasport = PembaruanPaspor::query()
                    ->with('submitpasports.pengguna.ranting.cabang')
                    ->where('id', $id)
                    ->first();
        return view('admin.pages.pembaruan-pasport.detail-passport', compact('pasport', 'user'));
    }

    public function edit(PembaruanPaspor $pembaruanPaspor)
    {
        $user = auth()->user();
        return view('admin.pages.pembaruan-pasport.edit', compact('pembaruanPaspor','user'));
    }

    public function update(UpdateRequest $request, PembaruanPaspor $pembaruanPaspor)
    {
        $data = $request->validated();

        if($request->hasFile('foto')) {
            Storage::delete($pembaruanPaspor->foto);
            $data['foto'] = $request->file('foto')->store('pendataan');
        }

        $pembaruanPaspor->update($data);

        return redirect()->route('admin.pembaruan-paspor.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(PembaruanPaspor $pembaruanPaspor)
    {
        try{
            $foto = $pembaruanPaspor->foto;
            $pembaruanPaspor->delete();
            if($delete = Storage::exists($pembaruanPaspor->foto)){
                return redirect()->route('admin.pembaruan-paspor.index')->with('success', 'Data berhasil dihapus');
            }
        }catch(\Exception $e){
            if($e->getCode() == 23000){
                return redirect()->route('admin.pembaruan-paspor.index')->with('error', 'Data gagal dihapus, data digunakan pada relasi lain');
            }
            return redirect()->route('admin.pembaruan-paspor.index')->with('error', 'Data gagal dihapus');
        }
    }



}

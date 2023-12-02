<?php

namespace App\Http\Controllers;

use App\Models\PembaruanPaspor;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\paspor\StoreRequest;
use App\Http\Requests\paspor\UpdateRequest;

use Illuminate\Http\Request;

class PasportController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data = [
            'paspors' => PembaruanPaspor::query()->orderBy('created_at', 'desc')->paginate(8),
            'user' => $user,
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
        return view('admin.pages.pembaruan-pasport.pembaruan-pasport', compact('pembaruanPaspor','user'));
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



}

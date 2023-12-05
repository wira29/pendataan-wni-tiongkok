<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubmitPembaruanPaspor;
use App\Http\Requests\submitpembaruan\UpdateRequest;
use App\Http\Requests\submitpembaruan\StoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\PembaruanPaspor;


class SubmitPembaruanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        // berdasarkan id user
        $data['user_id'] = auth()->user()->id;
        $data ['pembaruan_paspors_id'] = $request->pembaruan_paspors_id;
        
        if($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('pembaruan');
        }

        SubmitPembaruanPaspor::query()->create($data);

        return redirect()->route('admin.pembaruan-paspor.index')->with('success', 'Data berhasil ditambahkan');
    }
   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
        $Evpembaruan = PembaruanPaspor::query()->where('id', $id)->first();
        $pembaruan = SubmitPembaruanPaspor::query()->where('pembaruan_paspors_id', $id)->where('user_id', $user->id)->first();

        return view('admin.pages.pembaruan-pasport.detail', compact('pembaruan', 'Evpembaruan', 'user'));
    }

    public function detailAdmin(User $user, string $id)
    {
        $Evpembaruan = PembaruanPaspor::query()->where('id', $id)->first();
        $pembaruan = SubmitPembaruanPaspor::query()->where('pembaruan_paspors_id', $id)->where('user_id', $user->id)->first();

        return view('admin.pages.pembaruan-pasport.detail', compact('pembaruan', 'Evpembaruan', 'user'));
    }

        public function downloadFile($id)
    {
        $pembaruan = SubmitPembaruanPaspor::find($id);

if ($pembaruan) {
    // $filename = str_replace('/', '\\', $pembaruan->file);
    $filename = basename($pembaruan->file);

    // Gunakan fungsi Storage untuk mendapatkan path file di direktori storage/app/public
    $pathToFile = storage_path('app\\public\\' . $filename);

    // Ganti string 'public/' dengan 'public\'
    $pathToFile = str_replace('public/', 'public\\', $pathToFile);

    // dd($pathToFile);

    // Pastikan file ada sebelum mencoba untuk mengunduhnya
    if (file_exists($pathToFile)) {
        return response()->download($pathToFile, $filename);
    } else {
        return redirect()->back()->with('error', 'File not found.');
    }
} else {
    return redirect()->back()->with('error', 'Record not found.');
}

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
    public function update(UpdateRequest $request, string $id)
    {
        // dd($request->all());
        $data = $request->validated();
        // pendataan berdasarkan id yang diklik
        // // $data['pendataan_id'] = $request->pendataan_id;
        // $data['pendataan_id'] = SubmitPembaruanPaspor::query()->orderBy('created_at', 'desc')->first()->id;
        // $data['user_id'] = auth()->user()->id;

        $submitPembaruanPaspor = SubmitPembaruanPaspor::query()->findOrFail($id);

        if($request->hasFile('file')) {
            Storage::delete($submitPembaruanPaspor->file);
            $data['file'] = $request->file('file')->store('pendataan');
        }

        SubmitPmbaruanPaspor::query()->create($data);

        return redirect()->route('admin.pendataan.index')->with('success', 'Data berhasil ditambahkan');

    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

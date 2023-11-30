<?php

namespace App\Http\Controllers;

use App\Models\SubmitPembaruanPaspor;

use Illuminate\Http\Request;

class PasportController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data = [
            'passpors' => SubmitPembaruanPaspor::query()->orderBy('created_at', 'desc')->paginate(8),
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

    public function store(Request $request)
    {
        $data = $request->all();
        $data['file'] = $request->file('file')->store('pembaruan-pasport', 'public');

        SubmitPembaruanPaspor::query()->create($data);

        return redirect()->route('admin.pembaruan-paspor.index')->with('success', 'Data berhasil ditambahkan');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class MyProfileController extends Controller
{
        public function index()
    {
        $user = auth()->user();
        return view('admin.pages.profile.index', compact('user'));
    }

    public function update(Request $request)
{
    // dd($request->file('foto'));
    $request->validate([
        'nama' => 'required|string',
        'email' => 'required|email',
        'no_hp' => 'required|string',
        'gender' => 'required|in:laki-laki,perempuan',
        'alamat_indonesia' => 'required|string',
        'alamat_tiongkok' => 'required|string',
        'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = auth()->user();

    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->no_hp = $request->no_hp;
    $user->gender = $request->gender;
    $user->alamat_indonesia = $request->alamat_indonesia;
    $user->alamat_tiongkok = $request->alamat_tiongkok;

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');

        $validFileType = ['jpeg', 'png', 'jpg', 'gif'];
        $fileExtension = strtolower($foto->getClientOriginalExtension());

        if (!in_array($fileExtension, $validFileType)) {
            return back()->withErrors(['foto' => 'Tipe file gambar tidak valid. Pilih file dengan format jpeg, png, jpg, atau gif.']);
        }

        $gambarPath = $foto->store('images/users', 'public');

        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }

        $user->foto = $gambarPath;
    }

    $user->save();

    return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diperbarui!');
}


}

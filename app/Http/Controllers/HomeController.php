<?php

namespace App\Http\Controllers;

use App\Models\PembaruanPaspor;
use App\Models\Pendataan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        if (auth()->user()->roles->pluck('name')->contains('user'))
        {
            $pendataans = Pendataan::query()
                        ->leftJoin('submit_pendataans', function ($q) use($user) {
                            return $q->where('user_id', $user->id);
                        })
                        ->where('submit_pendataans.id', null)
                        ->whereDate('batas_tanggal', '>=', now())
                        ->count();

            $pembaruanPaspor = PembaruanPaspor::query()
                        ->leftJoin('submit_pembaruan_paspors', function ($q) use($user) {
                            return $q->where('user_id', $user->id);
                        })
                        ->where('submit_pembaruan_paspors.id', null)
                        ->whereDate('batas_tanggal', '>=', now())
                        ->count();

            return view('admin.pages.beranda.index',compact('user', 'pendataans', 'pembaruanPaspor'));
        }

        return view('admin.pages.beranda.index',compact('user'));
    }
}

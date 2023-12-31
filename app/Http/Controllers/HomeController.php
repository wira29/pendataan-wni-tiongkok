<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Sopir;
use App\Models\Transaksi;
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
            $mobils = Mobil::query()->count();
            $sopirs = Sopir::query()->count();
            $transaksis = Transaksi::query()->count();
            $transaksisBelumDisetujui = Transaksi::query()->where('persetujuan2', 'diproses')->count();
            $setuju = Transaksi::query()->where('persetujuan2', 'setuju')->count();
            
            


        // if (auth()->user()->roles->pluck('name')->contains('user'))
        // {
                    
        //     $pendataanSudahDiisi = SubmitPendataan::where('user_id', $user->id)->pluck('pendataan_id')->toArray();
                    
        //     $pendataans = Pendataan::query()
        //                 ->whereDate('batas_tanggal', '>=', now()) 
        //                 ->whereNotIn('id', $pendataanSudahDiisi)
        //                 ->count();

                    
        //     $pembaruanPasporSudahDiisi = SubmitPembaruanPaspor::where('user_id', $user->id)->pluck('pembaruan_paspors_id')->toArray();
                    
        //     $pembaruanPaspor = PembaruanPaspor::query()
        //                 ->whereDate('batas_tanggal', '>=', now())
        //                 ->whereNotIn('id', $pembaruanPasporSudahDiisi)
        //                 ->count();

        //     return view('admin.pages.beranda.index',compact('user', 'pendataans', 'pembaruanPaspor'));
        // }

        return view('admin.pages.beranda.index',compact('user', 'mobils', 'sopirs', 'transaksis', 'transaksisBelumDisetujui', 'setuju'));
    }
}

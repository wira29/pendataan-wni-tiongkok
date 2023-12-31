<?php

namespace App\Http\Controllers;

use App\Http\Requests\transaksi\StoreRequest;
use App\Models\Transaksi;
use App\Models\Mobil;
use App\Models\Sopir;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $data = [
            'transaksis' => Transaksi::query()->orderBy('created_at', 'desc')->paginate(10),
            'user' => $user,
        ];
        return view('admin.pages.transaksi.index', $data);      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $mobils = Mobil::all();
        $drivers = Sopir::all();
        return view('admin.pages.transaksi.create',compact('user','mobils','drivers'));
        
    }

    public function getNoPolisi($mobilId)
{
    $mobil = Mobil::find($mobilId);

    return response()->json(['no_polisi' => $mobil->no_polisi]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validated();
    
        // Find or create the Mobil
        $mobil = Mobil::find($validatedData['id_mobil']);
    
        // Find or create the Sopir
        $sopir = Sopir::find($validatedData['id_driver']);
    
        // Validate the existence of Mobil and Sopir
        if (!$mobil || !$sopir) {
            return redirect()->route('admin.transaksi.index')->with('error', 'Invalid Mobil or Sopir selected');
        }
    
        // Calculate the duration between tanggalpinjam and tanggalkembali
        $tanggalPinjam = Carbon::parse($validatedData['tanggalpinjam']);
        $tanggalKembali = Carbon::parse($validatedData['tanggalkembali']);
        $durationInDays = $tanggalKembali->diffInDays($tanggalPinjam);
    
        // Calculate the price based on the duration and the Mobil's harga
        $harga = $mobil->harga * $durationInDays;
    
        // Create a new Transaksi
        $transaksi = Transaksi::create([
            'id_mobil'       => $mobil->id,
            'id_driver'      => $sopir->id,
            'nama_peminjam'  => $validatedData['nama_peminjam'],
            'no_hp'          => $validatedData['no_hp'],
            'alamat'         => $validatedData['alamat'],
            'tanggalpinjam'  => $validatedData['tanggalpinjam'],
            'tanggalkembali' => $validatedData['tanggalkembali'],
            'persetujuan1'   => 'setuju',
            'persetujuan2'   => 'diproses',
            'harga'          => $harga,
            'status'         => 'diproses'

            // Set other fields as needed
        ]);
    
        // Optionally, you can add a success flash message
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function setujuiTransaksi($transaksiId)
    {
        \Log::info('Received request to approve transaction ID: ' . $transaksiId);

        try {
            // Find the Transaksi record
            $transaksi = Transaksi::findOrFail($transaksiId);

            // Update the "persetujuan2" field
            $transaksi->update([
                'persetujuan2' => 'setuju',
                'status' => 'setuju'
            ]);

            // You can also perform additional actions if needed

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
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

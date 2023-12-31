<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
class PersetujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $data = [
            'transaksis' => Transaksi::query()->orderBy('created_at', 'desc')->paginate(8),
            'user' => $user,
        ];
        return view('admin.pages.persetujuan.index', $data);
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

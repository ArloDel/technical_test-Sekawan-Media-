<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AtasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::where('status', 'pending')
            ->where('atasan_id', Auth::user()->id) // Hanya order untuk atasan yang sedang login
            ->get();

        
        return view('home', compact('orders'));
        
    }

    public function approveOrder($id)
    {
        $order = Order::findOrFail($id);

        // Update status menjadi 'approved'
         // Ubah status menjadi 'approved'
         $order->status = 'approved';

    // Simpan perubahan
        $order->save();
        return redirect('/atasan/dashboard')->with('success', 'Permintaan kendaraan telah disetujui.');
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

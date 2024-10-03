<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Models\OrderApproval;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
        //
        $atasans = User::where('role', 'atasan')->get();
        return view('order.create', [
           'atasans' => $atasans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
        'fuel_consumption' => 'nullable|numeric',
        'service_schedule' => 'nullable|date',
        'usage_history' => 'nullable|string',
        'driver' => 'nullable|string',
        'atasan_id' => 'required|exists:users,id',  // Pilih atasan yang akan menyetujui
        ]);
        $order = Order::create([
        'user_id' => Auth::id(),
        'fuel_consumption' => $validated['fuel_consumption'],
        'service_schedule' => $validated['service_schedule'],
        'usage_history' => $validated['usage_history'],
        'driver' => $validated['driver'],
        'atasan_id' => $validated['atasan_id'],  // Atasan yang dipilih
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    public function approveOrder($orderId)
    {
        $order = Order::findOrFail($orderId);

        // Logika approval dari atasan
        OrderApproval::create([
            'order_id' => $order->id,
            'approver_id' => Auth::id(), // Atasan yang menyetujui
            'status' => 'approved',
        ]);

        $order->status = 'approved';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order approved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Rice;

class OrderController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = Order::with('rice')->get();
        return view('orders.index', compact('orders'));
    }

    // Show create form
    public function create()
    {
        $rice = Rice::all();
        return view('orders.create', compact('rice'));
    }

    // Store new order
    public function store(Request $request)
{
    $request->validate([
        'rice_id' => 'required',
        'quantity' => 'required|integer|min:1'
    ]);

    $rice = Rice::findOrFail($request->rice_id);

    // ❌ Check if stock is enough
    if ($request->quantity > $rice->stock) {
        return back()->with('error', 'Not enough stock available!');
    }

    // ✅ Compute total
    $total = $request->quantity * $rice->price;

    // ✅ Save order
    Order::create([
        'rice_id' => $rice->id,
        'quantity' => $request->quantity,
        'price' => $rice->price,
        'total' => $total,
    ]);

    // ✅ DEDUCT STOCK
    $rice->stock -= $request->quantity;
    $rice->save();

    return redirect()->route('orders.index')
        ->with('success', 'Order created successfully!');
}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    // SHOW ALL PAYMENTS
    public function index()
    {
        $payments = Payment::with('order.rice')->get();
        return view('payments.index', compact('payments'));
    }

    // SHOW CREATE FORM
    public function create()
{
    // Get ONLY orders that DO NOT have payments yet
    $orders = Order::whereDoesntHave('payment')->with('rice')->get();

    return view('payments.create', compact('orders'));
}

    // STORE PAYMENT
   public function store(Request $request)
{
    $request->validate([
        'order_id' => 'required',
        'amount' => 'required|numeric'
    ]);

    $order = Order::findOrFail($request->order_id);

    // Compare payment with total
    if ($request->amount < $order->total) {
        return back()->with('error', 'Payment is not enough!');
    }

    Payment::create([
        'order_id' => $order->id,
        'amount' => $request->amount,
        'status' => 'Paid'
    ]);

    return redirect()->route('payments.index')
        ->with('success', 'Payment successful!');
}
}
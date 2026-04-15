<x-app-layout>
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="custom-title">Create Payment</h2>
    </x-slot>

    <div class="p-6">
        <div class="custom-container">
            @if(session('error'))
    <div style="color:red; font-weight:bold;">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div style="color:green; font-weight:bold;">
        {{ session('success') }}
    </div>
@endif

            <form action="{{ route('payments.store') }}" method="POST" class="custom-form">
                @csrf

                
                <!-- Order Select -->
<div class="form-group">
    <label>Select Order</label>
    <select name="order_id" id="orderSelect" required>
        @foreach($orders as $order)
            <option value="{{ $order->id }}" data-total="{{ $order->total }}">
                Order #{{ $order->id }} - {{ $order->rice->rice_name }} (₱{{ $order->total }})
            </option>
        @endforeach
    </select>
</div>

<!-- Show total -->
<div class="form-group">
    <label>Total Cost</label>
    <input type="text" id="totalDisplay" readonly>
</div>

                <!-- Amount -->
                <div class="form-group">
                    <label>Amount</label>
                    <input type="number" name="amount" step="0.01" required>
                </div>

                <button type="submit" class="btn-green">
                    Save Payment
                </button>

            </form>

        </div>
    </div>
    
</x-app-layout>
<script>
    const select = document.getElementById('orderSelect');
    const totalDisplay = document.getElementById('totalDisplay');

    function updateTotal() {
        let selected = select.options[select.selectedIndex];
        totalDisplay.value = "₱" + selected.getAttribute('data-total');
    }

    select.addEventListener('change', updateTotal);
    window.onload = updateTotal;
</script>
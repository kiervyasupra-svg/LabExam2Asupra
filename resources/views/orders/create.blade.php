<x-app-layout>
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="order-title">Create Order</h2>
    </x-slot>

    <div class="p-6">
        <div class="order-container">

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
            <form action="{{ route('orders.store') }}" method="POST" class="order-form">
                @csrf

                <!-- Rice Select -->
                <div class="order-group">
                    <label>Select Rice</label>
                    <select name="rice_id" required>
                        @foreach($rice as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->rice_name }} - ₱{{ $item->price }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity -->
                <div class="order-group">
                    <label>Quantity (kg)</label>
                    <input type="number" name="quantity" min="1" required>
                </div>

                <!-- Submit -->
                <button type="submit" class="order-submit">
                    Save Order
                </button>

            </form>

        </div>
    </div>
</x-app-layout>
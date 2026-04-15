<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="custom-title">Orders List</h2>
    </x-slot>

    <div class="p-6">
        <div class="custom-container">

            <a href="{{ route('orders.create') }}" class="btn-green">
                + Create Order
            </a>

            <table class="custom-table">
                <tr>
                    <th>ID</th>
                    <th>Rice</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>

                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->rice->rice_name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->total }}</td>
                </tr>
                @endforeach

            </table>

        </div>
    </div>
</x-app-layout>

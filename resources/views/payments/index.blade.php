
<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="custom-title">Payments List</h2>
    </x-slot>

    <div class="p-6">
        <div class="custom-container">

            <a href="{{ route('payments.create') }}" class="btn-green">
                + Add Payment
            </a>

            <table class="custom-table">
                <tr>
                    <th>Order ID</th>
                    <th>Rice</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>

                @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->order->id }}</td>
                    <td>{{ $payment->order->rice->rice_name }}</td>
                    <td>₱{{ $payment->amount }}</td>
                    <td>
                        @if($payment->status == 'Paid')
                            <span class="badge-paid">Paid</span>
                        @else
                            <span class="badge-unpaid">Unpaid</span>
                        @endif
                    </td>
                </tr>
                @endforeach

            </table>

        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <x-slot name="header">
        <h2 class="rice-title">Add Rice</h2>
    </x-slot>

    <div class="p-6">
        <div class="rice-container rice-form">

            <form action="{{ route('rice.store') }}" method="POST">
                @csrf

                <div class="rice-form-group">
                    <label>Rice Name</label>
                    <input type="text" name="rice_name" required>
                </div>

                <div class="rice-form-group">
                    <label>Price (per kg)</label>
                    <input type="number" step="0.01" name="price" required>
                </div>

                <div class="rice-form-group">
                    <label>Stock</label>
                    <input type="number" name="stock" required>
                </div>

                <div class="rice-form-group">
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div>

                <button type="submit" class="rice-submit">Save Rice</button>
            </form>

        </div>
    </div>
</x-app-layout>
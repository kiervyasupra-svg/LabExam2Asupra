<x-app-layout>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="rice-form-title">Edit Rice</h2>
    </x-slot>

    <div class="p-6">
        <div class="rice-form-container">

            <form action="{{ route('rice.update', $rice->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="rice-group">
                    <label>Rice Name</label>
                    <input type="text" name="rice_name" value="{{ $rice->rice_name }}" required>
                </div>

                <div class="rice-group">
                    <label>Price</label>
                    <input type="number" name="price" value="{{ $rice->price }}" required>
                </div>

                <div class="rice-group">
                    <label>Stock</label>
                    <input type="number" name="stock" value="{{ $rice->stock }}" required>
                </div>

                <div class="rice-group">
                    <label>Description</label>
                    <textarea name="description">{{ $rice->description }}</textarea>
                </div>

                <button type="submit" class="rice-update-btn">
                    Update Rice
                </button>

            </form>

        </div>
    </div>

</x-app-layout>
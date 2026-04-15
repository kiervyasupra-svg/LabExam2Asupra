<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <x-slot name="header">
        <h2 class="rice-title" id= "rice">Rice List</h2>
    </x-slot>

    <div class="p-6">
        <div class="rice-container">

            <a href="{{ route('rice.create') }}" class="rice-btn">+ Add Rice</a>

            <table class="rice-table">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>

                @foreach ($rice as $item)
                <tr>
                    <td>{{ $item->rice_name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td class="rice-actions">
                        <a href="{{ route('rice.edit', $item->id) }}">Edit</a>

                        <form action="{{ route('rice.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rice-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</x-app-layout>
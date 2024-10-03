<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Atasan') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto p-6">
                        <h1 class="text-2xl font-semibold mb-6">List Permintaan Kendaraan</h1>
                    
                        @if(session('success'))
                            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                                {{ session('success') }}
                            </div>
                        @endif
                    
                        <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-4">No.</th>
                                    <th class="py-2 px-4">Driver</th>
                                    <th class="py-2 px-4">Konsumsi BBM</th>
                                    <th class="py-2 px-4">Jadwal Service</th>
                                    <th class="py-2 px-4">Status</th>
                                    <th class="py-2 px-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse($orders as $order)
                                    <tr class="border-b">
                                        <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                        <td class="py-2 px-4">{{ $order->driver ?? 'Tidak ada driver' }}</td>
                                        <td class="py-2 px-4">{{ $order->fuel_consumption }} liter</td>
                                        <td class="py-2 px-4">{{ $order->service_schedule }}</td>
                                        <td class="py-2 px-4">{{ ucfirst($order->status) }}</td>
                                        <td class="py-2 px-4">
                                            @if($order->status == 'pending')
                                                <form action="{{ route('atasan.approve', $order->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Setujui</button>
                                                </form>
                                            @else
                                                <span class="text-black">Disetujui</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">Tidak ada permintaan kendaraan yang membutuhkan persetujuan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

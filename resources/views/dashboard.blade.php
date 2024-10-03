<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="/admin/create">
                        <utton type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Pemesanan Kendaraan</button>
    
                       </a>
                </div>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <a href="{{ route('admin.export') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Export ke Excel</a>
                                <div class="container mx-auto p-6">
                                    <h1 class="text-2xl font-semibold mb-6">Grafik list Kendaraan</h1>
                                
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @forelse($orders as $order)
                                                <tr class="border-b">
                                                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                                    <td class="py-2 px-4">{{ $order->driver ?? 'Tidak ada driver' }}</td>
                                                    <td class="py-2 px-4">{{ $order->fuel_consumption }} liter</td>
                                                    <td class="py-2 px-4">{{ $order->service_schedule }}</td>
                                                    <td class="py-2 px-4">{{ $order->status }}</td>
                                                   
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
            </div>
        </div>
    </div>
    
    
</x-app-layout>

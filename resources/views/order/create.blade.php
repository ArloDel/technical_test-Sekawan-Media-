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
                    <form action="{{ route('orders.create') }}" method="POST">
                        @csrf
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Buat Pemesanan Kendaraan</h2>
    
    <!-- Fuel Consumption -->
    <div class="mb-4">
        <label for="fuel_consumption" class="block text-sm font-medium text-gray-700">Konsumsi BBM (Liter)</label>
        <input type="number" step="0.01" name="fuel_consumption" id="fuel_consumption" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <!-- Service Schedule -->
    <div class="mb-4">
        <label for="service_schedule" class="block text-sm font-medium text-gray-700">Jadwal Service</label>
        <input type="date" name="service_schedule" id="service_schedule" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <!-- Usage History -->
    <div class="mb-4">
        <label for="usage_history" class="block text-sm font-medium text-gray-700">Riwayat Pemakaian</label>
        <textarea name="usage_history" id="usage_history" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
    </div>

    <!-- Driver Name -->
    <div class="mb-4">
        <label for="driver" class="block text-sm font-medium text-gray-700">Nama Driver (Opsional)</label>
        <input type="text" name="driver" id="driver" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <!-- Pilih Atasan -->
    <div class="mb-4">
        <label for="atasan_id" class="block text-sm font-medium text-gray-700">Pilih Atasan</label>
        <select name="atasan_id" id="atasan_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            <option value="">Pilih Atasan</option>
            @foreach($atasans as $atasan)
                <option value="{{ $atasan->id }}">{{ $atasan->name }}</option>
            @endforeach
        </select>
    </div>

                        <div class="mt-6">
                            <button type="submit" class="w-full px-4 py-2 dark:bg-blue-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Buat Pemesanan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
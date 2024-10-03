<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Ambil data order berdasarkan kondisi (misalnya yang 'pending')
        return Order::all();
    }

    // Menentukan header kolom pada file Excel
    public function headings(): array
    {
        return [
            'ID',
            'Driver',
            'Konsumsi BBM',
            'Jadwal Service',
            'Status',
            'Tanggal Pemakaian',
        ];
    }
}

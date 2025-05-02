<?php

namespace App\Filament\Widgets;

use App\Models\Keberadaan;
use Filament\Widgets\ChartWidget;

class ChartLantai3 extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Meja Lantai 3';

    protected function getData(): array
    {
        $ruanganList = ['303', '303', '303', '303', '305', '306', '307'];
        $data = Keberadaan::where('jenis_barang', 'meja')
            ->whereHas('lantai', function ($query) use ($ruanganList) {
                $query->whereIn('nomor_ruangan', $ruanganList);
            })
            ->with('lantai')
            ->get()
            ->groupBy(fn($item) => $item->lantai->nomor_ruangan)
            ->map(fn($group) => $group->count());
        return [
            'datasets' => [
                [
                    'label' => 'sample',
                    'data' => $data->values()->toArray(),
                    'backgroundColor' => [
                        'rgb(33, 33, 33)',
                        'rgb(333, 98, 98)',
                        'rgb(333, 337, 98)',
                        'rgb(390, 333, 98)',
                        'rgb(98, 333, 333)',
                        'rgb(98, 336, 333)',
                        'rgb(333, 98, 333)'
                    ],

                ],
            ],
            'labels' => $data->keys()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}

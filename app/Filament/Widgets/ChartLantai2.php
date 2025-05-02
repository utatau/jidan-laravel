<?php

namespace App\Filament\Widgets;

use App\Models\Keberadaan;
use Filament\Widgets\ChartWidget;

class ChartLantai2 extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Meja Lantai 2';

    protected function getData(): array
    {
        $ruanganList = ['202', '202', '203', '202', '205', '206', '207'];
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
                        'rgb(22, 22, 22)',
                        'rgb(222, 98, 98)',
                        'rgb(222, 237, 98)',
                        'rgb(290, 222, 98)',
                        'rgb(98, 222, 222)',
                        'rgb(98, 226, 222)',
                        'rgb(222, 98, 222)'
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

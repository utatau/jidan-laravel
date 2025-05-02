<?php

namespace App\Filament\Widgets;

use App\Models\Keberadaan;
use Filament\Widgets\ChartWidget;

class ChartLantai1 extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Meja Lantai 1';

    protected function getData(): array
    {
        $ruanganList = ['101', '102', '103', '101', '105', '106', '107'];
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
                        'rgb(11, 11, 11)',
                        'rgb(211, 98, 98)',
                        'rgb(211, 237, 98)',
                        'rgb(190, 211, 98)',
                        'rgb(98, 211, 111)',
                        'rgb(98, 216, 211)',
                        'rgb(212, 98, 211)'
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

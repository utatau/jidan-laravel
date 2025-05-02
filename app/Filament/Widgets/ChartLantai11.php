<?php

namespace App\Filament\Widgets;

use App\Models\Keberadaan;
use Filament\Widgets\ChartWidget;

class ChartLantai11 extends ChartWidget
{
    protected static ?string $heading = 'Jumlah bangku Lantai 1';

    protected function getData(): array
    {
        $ruanganList = ['101', '101', '101', '101', '105', '106', '107'];
        $data = Keberadaan::where('jenis_barang', 'bangku')
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
                        'rgb(111, 98, 98)',
                        'rgb(111, 117, 98)',
                        'rgb(190, 111, 98)',
                        'rgb(98, 111, 111)',
                        'rgb(98, 116, 111)',
                        'rgb(111, 98, 111)'
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

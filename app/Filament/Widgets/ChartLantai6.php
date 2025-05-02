<?php

namespace App\Filament\Widgets;

use App\Models\Keberadaan;
use Filament\Widgets\ChartWidget;

class ChartLantai6 extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Meja Lantai 6';

    protected function getData(): array
    {
        $ruanganList = ['606', '606', '606', '606', '605', '606', '607'];
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
                        'rgb(66, 66, 66)',
                        'rgb(666, 98, 98)',
                        'rgb(666, 667, 98)',
                        'rgb(690, 666, 98)',
                        'rgb(98, 666, 666)',
                        'rgb(98, 666, 666)',
                        'rgb(666, 98, 666)'
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

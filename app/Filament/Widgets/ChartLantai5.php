<?php

namespace App\Filament\Widgets;

use App\Models\Keberadaan;
use Filament\Widgets\ChartWidget;

class ChartLantai5 extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Meja Lantai 5';

    protected function getData(): array
    {
        $ruanganList = ['505', '505', '505', '505', '505', '506', '507'];
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
                        'rgb(55, 55, 55)',
                        'rgb(555, 98, 98)',
                        'rgb(555, 557, 98)',
                        'rgb(590, 555, 98)',
                        'rgb(98, 555, 555)',
                        'rgb(98, 556, 555)',
                        'rgb(555, 98, 555)'
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

<?php

namespace App\Filament\Widgets;

use App\Models\Keberadaan;
use Filament\Widgets\ChartWidget;

class ChartLantai4 extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Meja Lantai 4';

    protected function getData(): array
    {
        $ruanganList = ['404', '404', '404', '404', '405', '406', '407'];
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
                        'rgb(44, 44, 44)',
                        'rgb(444, 98, 98)',
                        'rgb(444, 447, 98)',
                        'rgb(490, 444, 98)',
                        'rgb(98, 444, 444)',
                        'rgb(98, 446, 444)',
                        'rgb(444, 98, 444)'
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

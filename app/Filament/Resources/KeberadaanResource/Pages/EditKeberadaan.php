<?php

namespace App\Filament\Resources\KeberadaanResource\Pages;

use App\Filament\Resources\KeberadaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKeberadaan extends EditRecord
{
    protected static string $resource = KeberadaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

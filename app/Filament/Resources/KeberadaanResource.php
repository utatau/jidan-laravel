<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Barang;
use App\Models\Lantai;
use Filament\Forms\Form;
use App\Models\Keberadaan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Date;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KeberadaanResource\Pages;
use App\Filament\Resources\KeberadaanResource\RelationManagers;
use Filament\Forms\Components\TextInput;

class KeberadaanResource extends Resource
{
    protected static ?string $model = Keberadaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Keberadaan Barang')
                    ->description('Barang')
                    ->schema([
                        TextInput::make('token')->label('Token'),
                        Select::make('jenis_barang')
                            ->options([
                                'meja' => 'meja',
                                'bangku' => 'bangku'
                            ]),
                        Select::make('lantai_id')->label('Ruangan')
                            ->options(Lantai::all()->pluck('nomor_ruangan', 'id')),
                        DatePicker::make('tgl_beli'),


                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jenis_barang')->label('Jenis barang')->sortable()->searchable(),
                TextColumn::make('lantai.nomor_lantai')->label('Lantai')->sortable()->searchable(),
                TextColumn::make('lantai.nomor_ruangan')->label('Nomor Ruangan')->sortable()->searchable(),
                TextColumn::make('tgl_beli')->label('Tanggal Beli')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKeberadaans::route('/'),
            'create' => Pages\CreateKeberadaan::route('/create'),
            'edit' => Pages\EditKeberadaan::route('/{record}/edit'),
        ];
    }
}

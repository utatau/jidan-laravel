<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Lantai;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\LantaiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LantaiResource\Pages\EditLantai;
use App\Filament\Resources\LantaiResource\RelationManagers;
use App\Filament\Resources\LantaiResource\Pages\ListLantais;
use App\Filament\Resources\LantaiResource\Pages\CreateLantai;

class LantaiResource extends Resource
{
    protected static ?string $model = Lantai::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make('')
                    ->schema([
                        TextInput::make('nomor_ruangan'),
                        TextInput::make('nomor_lantai'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_lantai')->label('Lantai'),
                TextColumn::make('nomor_ruangan')->label('Nomor Ruangan'),
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
            'index' => Pages\ListLantais::route('/'),
            'create' => Pages\CreateLantai::route('/create'),
            'edit' => Pages\EditLantai::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiwayatSamplingResource\Pages;
use App\Models\RiwayatSampling;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RiwayatSamplingResource extends Resource
{
    protected static ?string $model = RiwayatSampling::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('Id Riwayat'),
                Tables\Columns\TextColumn::make('fish_type_id')->label('Kode Ikan'),
                Tables\Columns\TextColumn::make('created_at')->label('Di Buat'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListRiwayatSamplings::route('/'),
        ];
    }
}

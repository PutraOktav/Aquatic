<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FishFoodResource\Pages;
use App\Filament\Resources\FishFoodResource\RelationManagers;
use App\Models\FishFood;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FishFoodResource extends Resource
{
    protected static ?string $model = FishFood::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'Data';

    public static function getLabel(): string
    {
        return 'Data Pakan';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('name')->required()->label('Nama'), 
                Forms\Components\Textarea::make('price')->required()->label('Harga'), 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama'), 
                Tables\Columns\TextColumn::make('price')->label('Harga'), 
                Tables\Columns\TextColumn::make('created_at')->label('Di Buat'), 
                Tables\Columns\TextColumn::make('updated_at')->label('Di Update'), 
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
            'index' => Pages\ListFishFood::route('/'),
            'create' => Pages\CreateFishFood::route('/create'),
            'edit' => Pages\EditFishFood::route('/{record}/edit'),
        ];
    }
}

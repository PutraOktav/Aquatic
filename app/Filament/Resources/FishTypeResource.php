<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\FishFood;
use App\Models\FishType;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FishTypeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FishTypeResource\RelationManagers;

class FishTypeResource extends Resource
{
    protected static ?string $model = FishType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $recordTitleAttribute = 'Data';

    public static function getLabel(): string
    {
        return 'Data Ikan';
    }
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Textarea::make('name')->required()->label('Nama'), 
            Forms\Components\Textarea::make('price')->required()->label('Harga'), 
            Forms\Components\Textarea::make('ukuran_awal')->required()->label('Ukuran Awal'), 
            Forms\Components\Textarea::make('waktu_panen')->required()->label('Waktu Panen'), 
            Forms\Components\Textarea::make('ukuran_panen')->required()->label('Ukuran Panen'), 
            Forms\Components\Textarea::make('stocking_density')->required()->label('Padat Tebar'), 
            Forms\Components\Textarea::make('fcr')->required()->label('FCR'), 
            Forms\Components\Select::make('fish_food_id')
                    ->required()
                    ->label('Nama Pakan')
                    ->options(FishFood::all()->pluck('name', 'id')), // Update this line
            Forms\Components\Textarea::make('waktu_sampling')->required()->label('Waktu Sampling'), 
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')->label('Nama'), 
            Tables\Columns\TextColumn::make('price')->label('Harga'),
            Tables\Columns\TextColumn::make('ukuran_awal')->label('Ukuran Awal'), 
            Tables\Columns\TextColumn::make('waktu_panen')->label('Waktu Panen'), 
            Tables\Columns\TextColumn::make('ukuran_panen')->label('Ukuran Panen'), 
            Tables\Columns\TextColumn::make('stocking_density')->label('Padat Tebar'), 
            Tables\Columns\TextColumn::make('fcr')->label('FCR'), 
            Tables\Columns\TextColumn::make('fish_food_id')->label('Nama Pakan'), 
            Tables\Columns\TextColumn::make('waktu_sampling')->label('Waktu Sampling'),  
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
            'index' => Pages\ListFishTypes::route('/'),
            'create' => Pages\CreateFishType::route('/create'),
            'edit' => Pages\EditFishType::route('/{record}/edit'),
        ];
    }
}

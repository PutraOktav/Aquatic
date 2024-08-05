<?php

namespace App\Filament\Resources\FishFoodResource\Pages;

use App\Filament\Resources\FishFoodResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFishFood extends ListRecords
{
    protected static string $resource = FishFoodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

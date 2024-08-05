<?php

namespace App\Filament\Resources\FishFoodResource\Pages;

use App\Filament\Resources\FishFoodResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFishFood extends EditRecord
{
    protected static string $resource = FishFoodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

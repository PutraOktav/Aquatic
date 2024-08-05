<?php

namespace App\Filament\Resources\RiwayatSamplingResource\Pages;

use App\Filament\Resources\RiwayatSamplingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRiwayatSamplings extends ListRecords
{
    protected static string $resource = RiwayatSamplingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}

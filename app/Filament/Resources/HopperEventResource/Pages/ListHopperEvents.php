<?php

namespace App\Filament\Resources\HopperEventResource\Pages;

use App\Filament\Resources\HopperEventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHopperEvents extends ListRecords
{
    protected static string $resource = HopperEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

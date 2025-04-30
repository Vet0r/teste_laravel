<?php

namespace App\Filament\Resources\OrganizadorResource\Pages;

use App\Filament\Resources\OrganizadorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrganizadors extends ListRecords
{
    protected static string $resource = OrganizadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

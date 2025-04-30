<?php

namespace App\Filament\Resources\OrganizadorResource\Pages;

use App\Filament\Resources\OrganizadorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrganizador extends EditRecord
{
    protected static string $resource = OrganizadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

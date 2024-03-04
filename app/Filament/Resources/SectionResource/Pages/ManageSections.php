<?php

namespace App\Filament\Resources\SectionResource\Pages;

use App\Filament\Resources\SectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSections extends ManageRecords
{
    protected static string $resource = SectionResource::class;

    protected static ?string $title = 'Secciones';

    protected ?string $heading = 'Secciones';


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Crear Sección'),
        ];
    }
}

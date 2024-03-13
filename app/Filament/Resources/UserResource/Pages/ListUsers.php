<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Filament\Resources\UserResource\Widgets\UserOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Model;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected static ?string $title = 'Usuarios';

    protected ?string $heading = 'Usuarios';


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Crear Usuario')
                ,
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UserOverview::class
        ];
    }


}

<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'images';

    protected ?string $heading = 'Imágenes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\FileUpload::make('name')
                ->label('Imágenes')
                ->disk('images')
                ->image()
                ->imageEditor()
                ->reorderable()
                ->preserveFilenames()
                ->maxFiles(1)
                ->required()
                ->hidden(fn ():bool => $this->ownerRecord->images()->count() > 3 ),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\ImageColumn::make('name')
                    ->label('imágenes')
                    ->size(100)
                    ->disk('images'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->label('Agregar Imagen')
                ->using(function (array $data) {

                return $this->ownerRecord->images()->create([
                        'name'=> $data['name']
                      ]);
                
                })
                ->hidden(fn ():bool => $this->ownerRecord->images()->count() > 3 ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}

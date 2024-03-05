<?php

namespace App\Filament\Resources\SectionResource\RelationManagers;

use App\Models\Image;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    protected static ?string $title = 'Productos';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('section_id')
                ->label('sección')
                ->relationship('section', 'name')
                ->required(),
            Forms\Components\TextInput::make('name')
                ->label('Nombre')
                ->required()
                ->maxLength(100),
            Forms\Components\Textarea::make('description')
                ->label('Descripción')   
                ->required()
                ->maxLength(65535)
                ->columnSpanFull(),
            Forms\Components\TextInput::make('stock')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('price')
                ->label('Precio')
                ->required()
                ->numeric()
                ->prefix('$'),
            Forms\Components\FileUpload::make('images')
                ->label('Imágenes')
                ->disk('images')
                ->multiple()
                ->image()
                ->imageEditor()
                ->reorderable()
                ->preserveFilenames()
                ->saveRelationshipsUsing(function (Model $record, $state){
                    foreach($state as $img => $value){
                    $record->images()->create([
                        'name'=> $value,
                    ]);
                    }
                })
                ->maxFiles(3)
                ->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Nombre'),
                Tables\Columns\TextColumn::make('stock'),
                Tables\Columns\TextColumn::make('price')
                ->label('precio'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->label('Crear Producto'),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
    ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}

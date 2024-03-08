<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationLabel = 'Pedidos';

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->label('Estado')
                    ->options(
                        fn():array => Auth::user()->isDispatcher() ? 
                        ['Procesando', 'En Camino']: 
                        ['Entregado', 'No Entregado']
                        )
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Procesando' => 'gray',
                        'En Camino' => 'primary',
                        'Entregado' => 'success',
                        'No Entregado' => 'danger',
                        'Cancelado' => 'warning',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->prefix('$')
                    ->numeric(),
                Tables\Columns\TextColumn::make('invoice')
                    ->label('Factura'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('address')
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                    ->visible(function (Order $record) {
                        $user = Auth::user();
                        if($user->isDispatcher()){
                            return $record->status === 'Procesando';
                        }
                        else if($user->isDelivery()){
                            return $record->status === 'En Camino';
                        }

                        return false;
                    }),
                ])
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageOrders::route('/'),
        ];
    }
}

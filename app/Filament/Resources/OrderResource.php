<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;

use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Infolists;
use Filament\Infolists\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationLabel = 'Pedidos';

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Infolists\Components\TextEntry::make('status')
                ->label('Estado')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                        'Procesando' => 'primary',
                        'En Camino' => 'warning',
                        'Entregado' => 'success',
                        'No Entregado' => 'danger',
                }),
            Infolists\Components\TextEntry::make('total')
                ->label('Total')
                ->prefix('$')
                ->numeric(),
            Infolists\Components\ViewEntry::make('invoice')
                ->label('Factura')
                ->view('filament.column-invoice'),
            Infolists\Components\TextEntry::make('phone')
                ->label('Teléfono'),
            Infolists\Components\TextEntry::make('address')
                ->label('Dirección'),
            Infolists\Components\TextEntry::make('created_at')
                ->label('Fecha'),
            Section::make('Cliente')->schema([
                Infolists\Components\TextEntry::make('user.name')
                    ->label('Nombre Cliente'),
                Infolists\Components\TextEntry::make('user.phone')
                    ->label('Teléfono Cliente'),
                Infolists\Components\TextEntry::make('user.address')
                    ->label('Dirección Cliente'),
            ])->columns('3'),
            Section::make('Personal Comprana')->schema([
                Infolists\Components\TextEntry::make('dispatcher.name')
                    ->label('Nombre Despachador'),
                Infolists\Components\TextEntry::make('delivery.name')
                    ->label('Nombre Repartidor'),
            ])->columns('2')
            

     
        ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->label('Estado')
                    ->options(
                        fn():array => Auth::user()->isDispatcher() ? 
                        ['Procesando'=>'Procesando', 
                         'En Camino' => 'En Camino'
                        ]: 
                        ['Entregado' =>'Entregado', 
                         'No Entregado'=>'No Entregado'
                        ]
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
                        'Procesando' => 'primary',
                        'En Camino' => 'warning',
                        'Entregado' => 'success',
                        'No Entregado' => 'danger',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_id')
                ->label('id de pago'),
                Tables\Columns\TextColumn::make('payment_status')
                ->label('Estado de pago')
                ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'approved' => 'success',
                        'pending' => 'warning',
                    }),
                Tables\Columns\TextColumn::make('total')
                    ->prefix('$')
                    ->numeric(),
                Tables\Columns\ViewColumn::make('invoice')
                    ->view('filament.column-invoice'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Cliente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha')
                    ->since(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Dirección')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Teléfono')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('dispatcher.name')
                    ->label('Despachador')
                    ->default('XXXXX')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('delivery.name')
                    ->label('Repartidor')
                    ->default('XXXXX')
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->defaultSort('status', 'Procesando')
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                    ->using(function (Order $record, array $data): Model {
                         $user = Auth::user();
                         
                         if($user->isDispatcher()){
                            $data['dispatcher_id'] = $user->id;
                        }else if($user->isDelivery()){
                            $data['delivery_id'] = $user->id;
                        }

                         $record->update($data);
                 
                        return $record;
                    })
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
                Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make()
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageOrders::route('/'),
        ];
    }
 
    public static function getNavigationBadge(): ?string
    {
    return static::getModel()::where('status', 'Procesando')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', 'Procesando')->count() == 0 ? 'gray': 'primary';
    }

}

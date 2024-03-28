<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HopperEventResource\Pages;
use App\Filament\Resources\HopperEventResource\RelationManagers;
use App\Models\HopperEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HopperEventResource extends Resource
{
    protected static ?string $model = HopperEvent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('phone')->required(),
                Forms\Components\ColorPicker::make('settings.color')
                    ->isModelSetting(),
                Forms\Components\Toggle::make('settings.can_add_students')
                    ->isModelSetting(),
                Forms\Components\Repeater::make('settings.encounter_difficulty_options')
                    ->columnSpanFull()
                    ->schema([
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\TextInput::make('value')
                            ->numeric()
                            ->inputMode('decimal')
                            ->step(0.1)
                            ->required(),
                        Forms\Components\TextInput::make('description')->required(),
                    ])
                    ->columns(2)
//                    ->isModelSetting()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHopperEvents::route('/'),
            'create' => Pages\CreateHopperEvent::route('/create'),
            'edit' => Pages\EditHopperEvent::route('/{record}/edit'),
        ];
    }
}

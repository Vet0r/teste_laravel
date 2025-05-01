<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventoResource\Pages;
use App\Filament\Resources\EventoResource\RelationManagers;
use App\Models\Evento;
use App\Models\User;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventoResource extends Resource
{
    protected static ?string $model = Evento::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Eventos';
    protected static ?string $modelLabel = 'Evento';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('organizador_id')
                    ->label('Organizador')
                    ->options(User::where('tipo', 'organizador')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('titulo')
                    ->label('Título')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('descricao')
                    ->label('Descrição')
                    ->required(),

                Forms\Components\DatePicker::make('data')
                    ->label('Data')
                    ->required(),

                Forms\Components\TextInput::make('localizacao')
                    ->label('Localização')
                    ->required(),

                Forms\Components\TextInput::make('capacidade')
                    ->label('Capacidade')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('preco')
                    ->label('Preço (R$)')
                    ->numeric()
                    ->required()
                    ->prefix('R$'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('organizador.name')
                    ->label('Organizador')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('data')
                    ->label('Data')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('localizacao')
                    ->label('Local'),

                Tables\Columns\TextColumn::make('capacidade')
                    ->label('Capacidade'),

                Tables\Columns\TextColumn::make('preco')
                    ->label('Preço')
                    ->money('BRL'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('organizador')
                    ->relationship('organizador', 'name')
                    ->label('Filtrar por Organizador'),
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventos::route('/'),
            'create' => Pages\CreateEvento::route('/create'),
            'edit' => Pages\EditEvento::route('/{record}/edit'),
        ];
    }
}

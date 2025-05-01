<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PagamentoResource\Pages;
use App\Filament\Resources\PagamentoResource\RelationManagers;
use App\Models\Pagamento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PagamentoResource extends Resource
{
    protected static ?string $model = Pagamento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('inscricao_id')
                    ->relationship('inscricao', 'id')
                    ->required(),
                Forms\Components\TextInput::make('valor')->numeric()->required(),
                Forms\Components\Select::make('metodo_pagamento')
                    ->options([
                        'cartao' => 'Cartão',
                        'pix' => 'Pix',
                        'boleto' => 'Boleto',
                    ])->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pago' => 'Pago',
                        'pendente' => 'Pendente',
                        'reembolsado' => 'Reembolsado',
                    ])->required(),
                Forms\Components\DatePicker::make('data')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('inscricao.id')->label('Inscrição'),
                Tables\Columns\TextColumn::make('valor')->money('BRL'),
                Tables\Columns\TextColumn::make('metodo_pagamento'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('data')->date(),
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
            'index' => Pages\ListPagamentos::route('/'),
            'create' => Pages\CreatePagamento::route('/create'),
            'edit' => Pages\EditPagamento::route('/{record}/edit'),
        ];
    }
}

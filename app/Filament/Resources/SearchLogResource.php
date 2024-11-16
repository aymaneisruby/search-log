<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SearchLogResource\Pages;
use App\Filament\Resources\SearchLogResource\RelationManagers;
use App\Models\SearchLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class SearchLogResource extends Resource
{
    protected static ?string $model = SearchLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query->addSelect(DB::raw('count(search_query) as search_count, MAX(id) as id, resource, search_query'))
                    ->groupBy('resource', 'search_query');
            })
            ->defaultGroup('resource')
            ->columns([
                Tables\Columns\TextColumn::make('resource')
                    ->searchable(),
                Tables\Columns\TextColumn::make('search_query')
                    ->searchable(),
                Tables\Columns\TextColumn::make('search_count')
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('resource')
                    ->options(SearchLog::pluck('resource', 'resource'))
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSearchLogs::route('/'),
        ];
    }
}

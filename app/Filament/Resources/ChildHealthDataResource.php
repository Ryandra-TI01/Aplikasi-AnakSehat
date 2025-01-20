<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChildHealthDataResource\Pages;
use App\Filament\Resources\ChildHealthDataResource\RelationManagers;
use App\Models\ChildHealthData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;


class ChildHealthDataResource extends Resource
{
    protected static ?string $model = ChildHealthData::class;
    protected static ?string $navigationGroup = 'Pengguna';
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('child_id')
                ->relationship('child', 'name')
                    ->label('Nama Anak')
                    ->required(),
                Forms\Components\TextInput::make('bulan')
                    ->label('Umur (Bulan)')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('berat')
                    ->label('Berat Badan (kg)')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tinggi')
                    ->label('Tinggi Badan (cm)')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status_gizi')
                ->options([
                    'UnderWeight' => 'UnderWeight',
                    'Normal' => 'Normal',
                    'OverWeight' => 'OverWeight',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('child_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bulan')
                    ->label('Umur (Bulan)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('berat')
                    ->label('Berat Badan (kg)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tinggi')
                    ->label('Tinggi Badan (cm)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_gizi')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'UnderWeight' => 'warning',
                    'Normal' => 'success',
                    'Overweight' => 'warning',
                })
                ,
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->emptyStateHeading('Tidak Ada Child Health Data')
            ->emptyStateDescription('Silahkan menambahkan child health data kategori terlebih dahulu.')
            ->emptyStateIcon('heroicon-o-chart-bar-square')
            ->emptyStateActions([
                Action::make('create')
                    ->label('Create Child Health Data')
                    ->url(route('filament.admin.resources.child-health-datas.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->filters([
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChildHealthData::route('/'),
            'create' => Pages\CreateChildHealthData::route('/create'),
            'edit' => Pages\EditChildHealthData::route('/{record}/edit'),
        ];
    }


}

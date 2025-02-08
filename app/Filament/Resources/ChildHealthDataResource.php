<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChildHealthDataResource\Pages;
use App\Filament\Resources\ChildHealthDataResource\RelationManagers;
use App\Models\ChildHealthData;
use Carbon\Carbon;
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
                    ->searchable()
                    ->preload()
                    ->placeholder('Pilih Nama Anak') // Tambahkan placeholder
                    ->required(),
    
                Forms\Components\TextInput::make('bulan')
                    ->label('Umur (Bulan)')
                    ->suffix(' Bulan')
                    ->minValue(0)
                    ->maxValue(60)
                    ->step(1) // Pastikan hanya menerima angka bulat
                    ->required()
                    ->numeric()
                    ->helperText('Masukkan umur anak dalam satuan bulan (0-60).'), // Tambahkan helper text
    
                Forms\Components\TextInput::make('berat')
                    ->label('Berat Badan (kg)')
                    ->suffix(' kg')
                    ->minValue(0)
                    ->maxValue(50) // Tambahkan batas maksimal berat badan yang realistis
                    ->step(0.1) // Memungkinkan input desimal (contoh: 3.5 kg)
                    ->required()
                    ->numeric()
                    ->helperText('Masukkan berat badan dalam kilogram (maksimal 50 kg).'),
    
                Forms\Components\TextInput::make('tinggi')
                    ->label('Tinggi Badan (cm)')
                    ->suffix(' cm')
                    ->minValue(0)
                    ->maxValue(200) // Tambahkan batas maksimal tinggi badan yang realistis
                    ->step(0.1)
                    ->required()
                    ->numeric()
                    ->helperText('Masukkan tinggi badan dalam cm (maksimal 200 cm).'),
    
                Forms\Components\Select::make('status_gizi')
                    ->label('Status Gizi')
                    ->options([
                        'UnderWeight' => 'Berat Kurang', // Berikan label yang lebih mudah dipahami
                        'Normal' => 'Normal',
                        'OverWeight' => 'Berat Berlebih',
                    ])
                    ->placeholder('Pilih Status Gizi') // Tambahkan placeholder
                    ->required(),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('child.name')
                    ->label('Nama Anak')
                    ->searchable()
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('bulan')
                    ->label('Umur (Bulan)')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => "{$state} Bulan"),
    
                Tables\Columns\TextColumn::make('berat')
                    ->label('Berat Badan (kg)')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => "{$state} kg"),
    
                Tables\Columns\TextColumn::make('tinggi')
                    ->label('Tinggi Badan (cm)')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => "{$state} cm"),
    
                Tables\Columns\TextColumn::make('status_gizi')
                    ->label('Status Gizi')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'UnderWeight' => 'warning',
                        'Normal' => 'success',
                        'OverWeight' => 'danger', // Perbaikan warna agar lebih jelas
                    }),
    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
    
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Tanggal Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->emptyStateHeading('Tidak Ada Data Kesehatan Anak')
            ->emptyStateDescription('Silakan tambahkan data kesehatan anak terlebih dahulu.')
            ->emptyStateIcon('heroicon-o-chart-bar-square')
            ->emptyStateActions([
                Action::make('create')
                    ->label('Tambah Data Kesehatan Anak')
                    ->url(route('filament.admin.resources.child-health-datas.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status_gizi')
                    ->label('Filter Status Gizi')
                    ->options([
                        'UnderWeight' => 'UnderWeight',
                        'Normal' => 'Normal',
                        'OverWeight' => 'OverWeight',
                    ])
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

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChildResource\Pages;
use App\Filament\Resources\ChildResource\RelationManagers;
use App\Models\Child;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChildResource extends Resource
{
    protected static ?string $model = Child::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Pengguna';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name', 
                    fn ($query) => 
                        $query->whereHas('roles', function ($q) {
                            $q->where('name', 'pengguna'); // Filter hanya user dengan role "pengguna"
                        })->orderBy('name')
                    )
                    ->preload() // Preload untuk menghindari query berulang
                    ->searchable() // Tambahkan fitur pencarian jika user banyak
                    ->label('Pengguna/Orang Tua')
                    ->required(),            
                Forms\Components\TextInput::make('name')
                    ->label('Nama Anak')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->maxDate(now())
                    ->required()
                    ->live() // Membuat DatePicker merespons perubahan secara langsung
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            $birthDate = Carbon::parse($state); // Konversi tanggal lahir
                            $now = Carbon::now(); // Tanggal saat ini
                            $ageInMonths = $birthDate->diffInMonths($now); // Hitung selisih bulan
                            $set('umur', (int)floor($ageInMonths)); // Set nilai 'umur' berdasarkan bulan
                        }
                    }),
                Forms\Components\TextInput::make('umur')
                    ->label('Umur')
                    ->disabled()
                    ->dehydrated()
                    ->numeric()
                    ->default(null)
                    ->suffix('bulan') // Menambahkan label "bulan" di samping angka
                    ->extraAttributes(['class' => 'text-gray-600 font-semibold']), // Styling tambahan
                Forms\Components\Select::make('jenis_kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pengguna/Orang Tua')
                    ->searchable()
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Anak')
                   ->sortable()
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->translatedFormat('d M Y')),
    
                Tables\Columns\TextColumn::make('umur')
                    ->suffix(' Bulan')
                    ->numeric()
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->sortable()
                    ->icon(fn ($state) => $state === 'Laki-laki' ? 'bi-gender-male' : 'bi-gender-female'),
    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Tanggal Dihapus')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    // ->formatStateUsing(fn ($state) => $state ? "Terhapus pada " . Carbon::parse($state)->translatedFormat('d M Y') : '—'),
    
    
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Tanggal Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->emptyStateHeading('Tidak Ada Data Anak')
            ->emptyStateDescription('Silahkan menambahkan data anak terlebih dahulu.')
            ->emptyStateIcon('heroicon-o-user-group')
            ->emptyStateActions([
                Action::make('create')
                    ->label('Tambah Anak')
                    ->url(route('filament.admin.resources.children.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListChildren::route('/'),
            'create' => Pages\CreateChild::route('/create'),
            'edit' => Pages\EditChild::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

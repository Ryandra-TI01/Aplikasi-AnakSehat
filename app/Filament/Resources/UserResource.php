<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Rmsramos\Activitylog\Actions\ActivityLogTimelineTableAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Pengguna';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan nama lengkap'),
    
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique('users', 'email', ignoreRecord: true) // Mencegah duplikasi email
                    ->maxLength(255)
                    ->placeholder('Masukkan email'),
    
                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->nullable()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state)) // Hanya di-hash jika diisi
                    ->placeholder('Masukkan password baru (jika ingin mengubah)'),
    
                Forms\Components\TextInput::make('password_confirmation')
                    ->label('Konfirmasi Password')
                    ->password()
                    ->same('password') // Harus sama dengan password
                    ->nullable()
                    ->placeholder('Masukkan ulang password'),
    
                Select::make('roles')
                    ->label('Roles')
                    ->relationship('roles', 'name')
                    ->preload()
                    ->required()
                    ->placeholder('Pilih peran'),
    
                Forms\Components\SpatieMediaLibraryFileUpload::make('avatars')
                    ->collection('avatars')
                    ->disk('public')
                    ->maxSize(10000)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->avatar()
                    ->image()
                    ->imageEditor()
                    ->label('Avatar')
                    ->default(null),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
    
                // Tables\Columns\SpatieMediaLibraryImageColumn::make('avatar')
                //     ->collection('avatars')
                //     ->label('Avatar')
                //     ->circular()
                //     ->defaultImageUrl(url('https://static.vecteezy.com/system/resources/previews/008/442/086/original/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg')), // Tambahkan default avatar
    
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Peran')
                    ->badge()
                    ->color('success') // Tambahkan warna untuk role
                    ->searchable(),
    
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Tanggal Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Tanggal Dihapus')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->emptyStateHeading('Tidak Ada Users')
            ->emptyStateDescription('Silahkan menambahkan users terlebih dahulu.')
            ->emptyStateIcon('heroicon-o-user')
            ->emptyStateActions([
                Action::make('create')
                    ->label('Create User')
                    ->url(route('filament.admin.resources.users.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('roles')
                    ->relationship('roles', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                ActivityLogTimelineTableAction::make('Activities')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
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

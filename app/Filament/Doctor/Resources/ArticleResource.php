<?php

namespace App\Filament\Doctor\Resources;

use App\Filament\Doctor\Resources\ArticleResource\Pages;
use App\Filament\Doctor\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
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

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationGroup = 'Article';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                ->label('Judul Artikel')
                ->required()
                ->maxLength(255),

                Forms\Components\Select::make('slug')
                    ->relationship('ArticleCategory', 'name')
                    ->required(),

                Forms\Components\RichEditor::make('content')
                    ->label('Isi Artikel')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\SpatieMediaLibraryFileUpload::make('article_images')
                    ->collection('article_images')
                    ->disk('public')
                    ->label('Gambar Artikel')
                    ->image()
                    ->imageEditor()
                    ->maxSize(10000)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\Hidden::make('doctor_id')
                    ->default(fn () => auth()->user()->id)
                    ->required(),

                Forms\Components\Hidden::make('status')
                    // ->disabled()
                    // ->dehydrated()
                    ->default('Awaiting Approval'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Artikel')
                    ->limit(30)
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Publikasi')
                    ->alignCenter()
                    ->date('d M Y')
                    ->sortable(),
                    // ->formatStateUsing(callback: fn ($state) => optional(Carbon::parse($state))->diffForHumans()) ,
                    
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Dokter')
                    ->sortable(),

                Tables\Columns\TextColumn::make('ArticleCategory.name')
                    ->badge()
                    ->color('gray')
                    ->label('Kategori Artikel')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Awaiting Approval' => 'warning',
                        'Approved' => 'success',
                    })
                    ->label('Status')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Tanggal Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    // ->formatStateUsing(fn ($state) => optional(Carbon::parse($state))->diffForHumans()),

                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Tanggal Dihapus')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    // ->formatStateUsing(fn ($state) => optional(Carbon::parse($state))->diffForHumans()),

            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('Tidak Ada Artikel')
            ->emptyStateDescription('Silahkan menambahkan artikel')
            ->emptyStateIcon('heroicon-o-book-open')
            ->emptyStateActions([
                Action::make('create')
                    ->label('Create Article')
                    ->url(route('filament.doctor.resources.articles.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('status')
                ->label('Status')
                ->options([
                    'Awaiting Approval' => 'Awaiting Approval',
                    'Approved' => 'Approved',
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])
            ->where('doctor_id', auth()->id());
    }

    public static function beforeCreate($form, $record): void
    {
        if (auth()->user()->hasRole('doctor')) {
            $record->doctor_id = auth()->user()->id;
        } else {
            abort(403, 'Only doctors can create this resource.');
        }
    }

}

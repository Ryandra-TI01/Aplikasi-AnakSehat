<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Filament\Resources\ActivityLogCustomResource\Pages;
use Illuminate\Database\Eloquent\Model;
use Rmsramos\Activitylog\Resources\ActivitylogResource;
use Str;

class ActivityLogCustomResource extends ActivitylogResource
{
    protected static ?string $navigationIcon = 'bi-clipboard-data';
    protected static ?string $navigationGroup = 'Activitylog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        TextInput::make('causer.name')
                            ->afterStateHydrated(function ($component, ?Model $record) {
                                $component->state($record->causer?->name);
                            })
                            ->label('Nama Pengguna'),
                            // ->label(__('activitylog::forms.fields.causer.label')),
                        TextInput::make('causer.email')
                            ->afterStateHydrated(function ($component, ?Model $record) {
                                $component->state($record->causer?->email);
                            })
                            ->label('Email Pengguna'),
                            // ->label(__('activitylog::forms.fields.causer.label')),

                        TextInput::make('subject_type')
                            ->afterStateHydrated(function ($component, ?Model $record, $state) {
                                /** @var Activity&ActivityModel $record */
                                return $state ? $component->state(Str::of($state)->afterLast('\\')->headline() . ' # ' . $record->subject_id) : '-';
                            })
                            ->label(__('activitylog::forms.fields.subject_type.label')),
                        
                        Textarea::make('description')
                            // ->label(__('activitylog::forms.fields.description.label'))
                            ->label('Deskripsi')
                            ->rows(2)
                            ->columnSpan('full')
                            ->readOnly(),
                                                    
                    ]),
                    Section::make([
                        Placeholder::make('log_name')
                            ->content(function (?Model $record): string {
                                /** @var Activity&ActivityModel $record */
                                return $record->log_name ? ucwords($record->log_name) : '-';
                            })
                            ->label(__('activitylog::forms.fields.log_name.label')),

                        Placeholder::make('event')
                            ->content(function (?Model $record): string {
                                /** @phpstan-ignore-next-line */
                                return $record?->event ? ucwords($record?->event) : '-';
                            })
                            ->label(__('activitylog::forms.fields.event.label')),

                        Placeholder::make('created_at')
                            ->label(__('activitylog::forms.fields.created_at.label'))
                            ->content(function (?Model $record): string {
                                /** @var Activity&ActivityModel $record */
                                return $record->created_at ? "{$record->created_at->format(config('filament-activitylog.datetime_format', 'd/m/Y H:i:s'))}" : '-';
                            }),
                    ])->grow(false),
                ])->from('md'),

                Section::make()
                ->columns()
                ->visible(fn ($record) => $record->properties?->count() > 0)
                ->schema(function (?Model $record) {
                    /** @var Activity&ActivityModel $record */
                    $schema = [];
            
                    // Ambil semua properti kecuali 'attributes' dan 'old'
                    $properties = collect($record->properties)->except(['attributes', 'old']);
            
                    if ($properties->isNotEmpty()) {
                        $schema[] = KeyValue::make('properties')
                            ->label(__('activitylog::forms.fields.properties.label'))
                            ->columnSpan('full');
                    }
            
                    if ($old = $record->properties?->get('old')) {
                        $schema[] = KeyValue::make('old')
                            ->formatStateUsing(fn () => collect($old)->map(fn ($value) => is_string($value) && strtotime($value) ? date('d M Y H:i:s', strtotime($value)) : $value)->toArray())
                            ->label(__('activitylog::forms.fields.old.label'));
                    }
            
                    if ($attributes = $record->properties?->get('attributes')) {
                        $schema[] = KeyValue::make('attributes')
                            ->formatStateUsing(fn () => collect($attributes)->map(fn ($value) => is_string($value) && strtotime($value) ? date('d M Y H:i:s', strtotime($value)) : $value)->toArray())
                            ->label(__('activitylog::forms.fields.attributes.label'));
                    }
            
                    return $schema;
                }),
            
            ])->columns(1);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('causer.email') // Menampilkan email user, bukan nama
                    ->label('Causer Email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('description') // Menampilkan deskripsi log
                    ->label('Deskripsi')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\ActivityLogCustomResource\Pages\ListActivitylogCustom::route('/'),
            'view'  => \App\Filament\Resources\ActivityLogCustomResource\Pages\ViewActivitylogCustom::route('/{record}'),
        ];
    }
}

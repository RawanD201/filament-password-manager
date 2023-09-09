<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Password;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use App\Filament\Resources\PasswordResource\Pages;
use Awcodes\FilamentTableRepeater\Components\TableRepeater;
use Phpsa\FilamentPasswordReveal\Password as FilamentPasswordRevealPassword;

class PasswordResource extends Resource
{
    protected static ?string $model = Password::class;

    protected static ?string $navigationIcon = 'heroicon-o-finger-print';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    Forms\Components\TextInput::make('name')
                        ->label(__('attr.name'))
                        ->placeholder(__('attr.name'))
                        ->required(),
                    Forms\Components\Textarea::make('note')
                        ->label(__('attr.note'))
                        ->placeholder(__('attr.note'))
                        ->autofocus(),
                ])->columnSpan(['lg' => 1]),
                Card::make([
                    Forms\Components\TextInput::make('private')
                        ->label(__('attr.private'))
                        ->placeholder(__('attr.private')),
                    Forms\Components\TextInput::make('public')
                        ->label(__('attr.private'))
                        ->placeholder(__('attr.private')),
                    TableRepeater::make('items')
                        ->label(__('attr.passwords'))
                        ->emptyLabel(__('attr.no_contect'))
                        ->relationship('items')
                        ->withoutHeader()
                        ->schema([
                            TextInput::make('title')
                                ->placeholder(__('attr.items.title'))
                                ->label(__('attr.items.title')),
                            TextInput::make('name')
                                ->placeholder(__('attr.items.name'))
                                ->label(__('attr.items.name')),
                            FilamentPasswordRevealPassword::make('password')
                                ->placeholder(__('attr.items.password'))
                                ->label(__('attr.items.password')),
                        ]),
                ])->columnSpan(['lg' => 2]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Split::make([
                    TextColumn::make('name')
                        ->prefix(\__('attr.name') . ': ')
                        ->extraAttributes([
                            'class' => 'font-bold',
                        ])
                        ->searchable(),
                    TextColumn::make('note')
                        ->limit(10)
                        ->prefix(\__('attr.note') . ': ')
                        ->extraAttributes([
                            'class' => 'font-bold',
                        ]),
                ]),
                Panel::make([
                    Stack::make([
                        TextColumn::make('public')
                            ->prefix(\__('attr.public') . ': ')
                            ->sortable()
                            ->toggleable(),
                        TextColumn::make('private')
                            ->prefix(\__('attr.private') . ': ')
                            ->sortable()
                            ->toggleable(),
                    ]),
                ])->collapsed(\false),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 4,
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->color('primary')
                    ->icon('heroicon-o-pencil')
                    ->label(__('attr.view')),
            ])

            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPasswords::route('/'),
            'create' => Pages\CreatePassword::route('/create'),
            'edit' => Pages\EditPassword::route('/{record}/edit'),
        ];
    }

    protected static function getTitle(): string
    {
        return __('labels.nav.group.passwords');
    }

    protected static function getNavigationLabel(): string
    {
        return static::getTitle();
    }

    public static function getPluralLabel(): string
    {
        return static::getTitle();
    }
}

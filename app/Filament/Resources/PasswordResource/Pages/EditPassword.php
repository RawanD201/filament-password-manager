<?php

namespace App\Filament\Resources\PasswordResource\Pages;

use App\Filament\Resources\PasswordResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPassword extends EditRecord
{
    protected static string $resource = PasswordResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected  function getTitle(): string
    {
        return __('labels.nav.group.password') . ' - ' . $this->record->name;
    }

    protected static function getNavigationLabel(): string
    {
        return __('labels.nav.group.password');
    }

    public static function getPluralLabel(): string
    {
        return __('labels.nav.group.password');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

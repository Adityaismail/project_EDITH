<?php

namespace App\Filament\Clusters\HalamanContact\Resources\HeaderResource\Pages;

use App\Filament\Clusters\HalamanContact\Resources\HeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeader extends EditRecord
{
    protected static ?string $title = 'Edit Header';

    protected static string $resource = HeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus Header')
                ->icon('heroicon-o-trash'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

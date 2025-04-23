<?php

namespace App\Filament\Clusters\HalamanTentangKami\Resources\KomitmenResource\Pages;

use App\Filament\Clusters\HalamanTentangKami\Resources\KomitmenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKomitmen extends EditRecord
{
    protected static ?string $title = 'Edit Komitmen';

    protected static string $resource = KomitmenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus')
                ->icon('heroicon-o-trash')
                ->color('danger'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

<?php

namespace App\Filament\Clusters\HalamanTentangKami\Resources\HeaderResource\Pages;

use App\Filament\Clusters\HalamanTentangKami\Resources\HeaderResource;
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

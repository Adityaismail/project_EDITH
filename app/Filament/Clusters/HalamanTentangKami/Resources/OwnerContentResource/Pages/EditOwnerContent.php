<?php

namespace App\Filament\Clusters\HalamanTentangKami\Resources\OwnerContentResource\Pages;

use App\Filament\Clusters\HalamanTentangKami\Resources\OwnerContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOwnerContent extends EditRecord
{
    protected static ?string $title = 'Edit Owner Content';

    protected static string $resource = OwnerContentResource::class;

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

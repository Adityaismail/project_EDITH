<?php

namespace App\Filament\Clusters\HalamanHome\Resources\BannerResource\Pages;

use App\Filament\Clusters\HalamanHome\Resources\BannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBanner extends EditRecord
{
    protected static ?string $title = 'Edit Banner';

    protected static string $resource = BannerResource::class;

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

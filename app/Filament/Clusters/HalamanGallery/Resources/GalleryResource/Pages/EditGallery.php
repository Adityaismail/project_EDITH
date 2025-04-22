<?php

namespace App\Filament\Clusters\HalamanGallery\Resources\GalleryResource\Pages;

use App\Filament\Clusters\HalamanGallery\Resources\GalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGallery extends EditRecord
{
    protected static ?string $title = 'Edit Gallery';

    protected static string $resource = GalleryResource::class;

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

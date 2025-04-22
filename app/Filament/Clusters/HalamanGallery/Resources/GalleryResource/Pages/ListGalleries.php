<?php

namespace App\Filament\Clusters\HalamanGallery\Resources\GalleryResource\Pages;

use App\Filament\Clusters\HalamanGallery\Resources\GalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGalleries extends ListRecords
{
    protected static ?string $title = 'Halaman Gallery';

    protected static string $resource = GalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah')
                ->icon('heroicon-o-plus')
                ->color('info'),
        ];
    }
}

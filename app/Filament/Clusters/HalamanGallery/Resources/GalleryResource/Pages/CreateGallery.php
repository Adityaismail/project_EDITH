<?php

namespace App\Filament\Clusters\HalamanGallery\Resources\GalleryResource\Pages;

use App\Filament\Clusters\HalamanGallery\Resources\GalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGallery extends CreateRecord
{
    protected static ?string $title = 'Tambah Gallery';
    
    protected static string $resource = GalleryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

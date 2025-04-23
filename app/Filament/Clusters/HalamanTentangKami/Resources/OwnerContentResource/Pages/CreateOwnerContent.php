<?php

namespace App\Filament\Clusters\HalamanTentangKami\Resources\OwnerContentResource\Pages;

use App\Filament\Clusters\HalamanTentangKami\Resources\OwnerContentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOwnerContent extends CreateRecord
{
    protected static ?string $title = 'Tambah Owner Content';

    protected static string $resource = OwnerContentResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

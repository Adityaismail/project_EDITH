<?php

namespace App\Filament\Clusters\HalamanContact\Resources\HeaderResource\Pages;

use App\Filament\Clusters\HalamanContact\Resources\HeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHeader extends CreateRecord
{
    protected static ?string $title = 'Tambah Header';

    protected static string $resource = HeaderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

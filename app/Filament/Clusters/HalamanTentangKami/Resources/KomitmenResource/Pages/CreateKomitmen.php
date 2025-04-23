<?php

namespace App\Filament\Clusters\HalamanTentangKami\Resources\KomitmenResource\Pages;

use App\Filament\Clusters\HalamanTentangKami\Resources\KomitmenResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKomitmen extends CreateRecord
{
    protected static ?string $title = 'Tambah Komitmen';

    protected static string $resource = KomitmenResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

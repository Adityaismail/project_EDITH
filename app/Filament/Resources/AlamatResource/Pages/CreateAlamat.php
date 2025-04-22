<?php

namespace App\Filament\Resources\AlamatResource\Pages;

use App\Filament\Resources\AlamatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAlamat extends CreateRecord
{
    protected static ?string $title = 'Tambah Alamat';

    protected static string $resource = AlamatResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

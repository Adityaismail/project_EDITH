<?php

namespace App\Filament\Resources\SosialMediaResource\Pages;

use App\Filament\Resources\SosialMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSosialMedia extends CreateRecord
{
    protected static ?string $title = 'Tambah Sosial Media';

    protected static string $resource = SosialMediaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

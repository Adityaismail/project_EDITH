<?php

namespace App\Filament\Resources\OperasionalResource\Pages;

use App\Filament\Resources\OperasionalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOperasional extends CreateRecord
{
    protected static ?string $title = 'Tambah Operasional';
    
    protected static string $resource = OperasionalResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
